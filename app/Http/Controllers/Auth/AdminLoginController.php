<?php
namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Cookie;
use App\LoginLog;
use App\LoginSessions;
class AdminLoginController extends Controller
{
	use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
	
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
	
    protected function guard()
	{
        return Auth::guard('admin');
    }
	
   public function getBrowser()
{
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$bname = 'Unknown';
$platform = 'Unknown';
$version= "";

//First get the platform?
if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
}
elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
}

// Next get the name of the useragent yes seperately and for good reason
if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
{
    $bname = 'Internet Explorer';
    $ub = "MSIE";
}
elseif(preg_match('/Firefox/i',$u_agent))
{
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
}
elseif(preg_match('/Chrome/i',$u_agent))
{
    $bname = 'Google Chrome';
    $ub = "Chrome";
}
elseif(preg_match('/Safari/i',$u_agent))
{
    $bname = 'Apple Safari';
    $ub = "Safari";
}
elseif(preg_match('/Opera/i',$u_agent))
{
    $bname = 'Opera';
    $ub = "Opera";
}
elseif(preg_match('/Netscape/i',$u_agent))
{
    $bname = 'Netscape';
    $ub = "Netscape";
}

// finally get the correct version number
$known = array('Version', $ub, 'other');
$pattern = '#(?<browser>' . join('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $u_agent, $matches)) {
    // we have no matching number just continue
}

// see how many we have
$i = count($matches['browser']);
if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'][0];
    }
    else {
        $version= $matches['version'][1];
    }
}
else {
    $version= $matches['version'][0];
}

// check if we have a number
if ($version==null || $version=="") {$version="?";}

return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
);
}


function getOS() { 
    $agent = $_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/Linux/',$agent)) $os = 'Linux';
    elseif(preg_match('/Win/',$agent)) $os = 'Windows';
    elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
    else $os = 'UnKnown';
    
    
    return $os;
}

	public function authenticated(Request $request, $user)
    {		
        // dd($request->all());
         
		if(!empty($request->remember)) {
			\Cookie::queue(\Cookie::make('email', $request->email, 3600));
			\Cookie::queue(\Cookie::make('password', $request->password, 3600));
		} else {
			\Cookie::queue(\Cookie::forget('email'));
			\Cookie::queue(\Cookie::forget('password'));
		}
        $ip =  $_SERVER['REMOTE_ADDR'];
        $ua = $this->getBrowser();
        $browser = $ua['name']; 
        $os = $this->getOS();
        LoginSessions::updateOrCreate(['ip'=>$ip],[ 
            'user_id'=>$user->id ?? '',
            'os'=>$os ?? '',
            'browser'=>$browser ?? '', 
        ]);


		$obj = new LoginLog;
		$obj->user_id = $user->id;
		$obj->ip = $_SERVER['REMOTE_ADDR'];
		$obj->date = date('Y-m-d h:i:s');
		$obj->save();
        return redirect()->intended($this->redirectPath());
    }
	
	public function logout(Request $request)
    {
		Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
		return redirect('/');
    }
}
