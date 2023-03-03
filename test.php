<?php
$ee = '{
  "userid": "adminholy1@insurance.com",
  "password": "Bagic123",
  "bjaztravelissue": {
    "passigneename": "Pankaj",
    "pfulltermpremium": "0",
    "telephone3": "9464527274",
    "ptotalpremium": "0",
    "telephone2": "",
    "nationalid": "INDIA",
    "userid": "adminholy1@insurance.com",
    "surname": "Sharma",
    "ppremiumpayerid": "0",
    "partnerref": "P",
    "psubagentcode": "0",
    "pdealercode": "0",
    "ploading": "0",
    "pfamilyflag": "N",
    "pservicetaxamt": "0",
    "ppartnerid": "0",
    "pdiscount": "0",
    "middlename": "ku",
    "fax": "0",
    "countrycode": "0",
    "addressline5": "shastri nagar jagraon",
    "addressline4": "142026",
    "addressline3": "India",
    "postcode": "142026",
    "pproduct": "9910",
    "addressline2": "ADDRESSLIN2",
    "pfromdate": "16-JUL-2020",
    "addressline1": "shastri nagar jagraon",
    "pcompref": "",
    "taxid": "0",
    "email": "pankaj95.mca10.lgc@gmail.com",
    "pruralflag": "",
    "pcovernoteno": "",
    "quality": "0",
    "ptravelplan": "BHARAT BHRAMAN - PLAN E",
    "ppassportno": "",
    "pservicecharge": "0",
    "ppaymentmode": "Customer float",
    "language": "",
    "pspcondition": "N",
    "pareaplan": "Within India - Domestic",
    "ppremiumpayerflag": "",
    "employmentstatus": "",
    "pmasterpolicyno": "0",
    "dateofbirth": "11-Sep-1989",
    "sex": "M",
    "institutionname": "",
    "contact1": "9464527274",
    "partid": "0",
    "addid": "0",
    "maritalstatus": "",
    "partnertype": "P",
    "ptermstartdate": "14-JUL-2020",
    "regnumber": "0",
    "plocationcode": "",
    "pempno": "0",
    "policyno": "",
    "firstname": "Pankaj",
    "pdateofbirth": "11-Sep-1989",
    "aftertitle": "",
    "pintermediarycode": "",
    "ptermenddate": "20-JUL-2020",
    "beforetitle": "Mr.",
    "ptodate": "20-JUL-2020",
    "pdestination": "",
    "pusername": "",
    "pspdiscountamt": "0",
    "pspdiscount": "0",
    "checkbox": "",
    "pcoorgunit": "",
    "vatnumber": "0",
    "notes": "",
    "telephone": "9464527274"
  },
  "familyparamlist": [   
  ],
  "pCoverList_out": [
    {
      "pbenefits": "",
      "pdeductible": "",
      "plimits": ""
    }
  ],
  "pPolicyFamilyList_out": [
    {
      "passignee": "",
      "pdob": "",
      "pname": "",
      "pgender": "",
      "prelation": "",
      "ppassport": ""
    }
  ],
  "pPolicyObj_out": {
    "passigneeName": "",
    "pfullTermPremium": "",
    "ptelephone": "",
    "pdepartureDate": "",
    "paddressLine2": "",
    "paddressLine3": "",
    "paddressLine1": "",
    "ppolicyRef": "",
    "pgrossPremium": "",
    "pserviceTaxAmt": "",
    "pplan": "",
    "pdateOfBirth": "",
    "preturnDate": "",
    "pimdcode": "",
    "psurname": "",
    "parea": "",
    "pcustomerTextName": "",
    "pfirstName": "",
    "ppostcode": "",
    "ppartId": "",
    "ppassportNo": "",
    "pspCondition": "",
    "pentryDate": "",
    
    "recString20": {
      "stringValue1": "",
      "stringValue2": "",
      "stringValue3": "",
      "stringValue4": "",
      "stringValue5": "",
      "stringValue6": "",
      "stringValue7": "",
      "stringValue8": "",
      "stringValue9": "",
      "stringValue10": "",
      "stringValue11": "",
      "stringValue12": "",
      "stringValue13": "",
      "stringValue14": "",
      "stringValue15": "",
      "stringValue16": "",
      "stringValue17": "",
      "stringValue18": "",
      "stringValue19": "",
      "stringValue20": ""
    }
  },
  "ppayDtls_out": "",
  "pagentName_out": "",
  "proLocationAdd_out": "",
  "pError_out": {
    "errNumber": "",
    "parName": "",
    "property": "",
    "errText": "",
    "parIndex": "",
    "errLevel": ""
  },
  "pErrorCode_out": "0"
}';
 $ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, "https://api.bagicpp.bajajallianz.com/BjazTravelWebServices/issuepolicy
");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ee);
curl_setopt($ch, CURLOPT_ENCODING,  '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
echo $result;
?>