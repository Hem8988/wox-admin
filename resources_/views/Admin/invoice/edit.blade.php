@extends('layouts.admin')
@section('title', 'Edit Invoice')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Invoice</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Invoice</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->	
	<!-- Breadcrumb start-->
	<!--<ol class="breadcrumb">
		<li class="breadcrumb-item active">
			Home / <b>Dashboard</b>
		</li>
		@include('../Elements/Admin/breadcrumb')
	</ol>-->
	<!-- Breadcrumb end-->
	
	<!-- Main content --> 
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- Flash Message Start -->
					<div class="server-error">
						@include('../Elements/flash-message')
					</div>
					<!-- Flash Message End -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit Invoice</h3>
						</div>
					  <!-- /.card-header -->
						<div class="card-body">
							<!-- form start -->
							{{ Form::open(array('url' => 'admin/invoice/edit', 'name'=>"edit-invoice", 'autocomplete'=>'off', "enctype"=>"multipart/form-data")) }}
							{{ Form::hidden('id', @$fetchedData->id) }}
								<div class="form-group" style="text-align:right;">
									<a style="margin-right:5px;" href="{{route('admin.invoice.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
									{{ Form::button('<i class="fa fa-edit"></i> Update Invoice', ['class'=>'btn btn-primary', 'onClick'=>'customValidate("edit-invoice")' ]) }}
								</div> 	 
								<div class="row"> 
									@if(@Auth::user()->is_business_gst == 'yes')
										<?php
										$que = \App\TaxRate::where('user_id',Auth::user()->id);
										$tocoun = $que->count();
										$taxresult = $que->get();
										
									?>
									<div class="col-sm-12">
										<div class="form-group row">
											<label for="tax" class="col-sm-3 col-form-label">Select Tax</label>
											<label for="taxno" class="col-sm-3 col-form-label"><input <?php if(@$fetchedData->tax == 0){ echo 'checked'; }?> id="taxno" class="taxrate" type="radio" name="tax" value="0">No Tax</label>
											@if($tocoun !== 0)
											@foreach($taxresult as $tlist)
										<label for="tax{{$tlist->id}}" class="col-sm-3 col-form-label"><input id="tax{{$tlist->id}}" type="radio"  ratename="{{$tlist->name}}" class="taxrates" ratetax="{{$tlist->rate}}" name="tax" value="{{$tlist->id}}" <?php if(@$fetchedData->tax == $tlist->id){ echo 'checked'; }?>>{{$tlist->name}}</label>
											@endforeach
											@endif
										</div>
									</div>
									
									@endif
									<div class="col-sm-12">    
										<div class="form-group row">  
											<label for="customer_name" class="col-sm-3 col-form-label">Customer Name <span style="color:#ff0000;">*</span></label>
											<div class="col-sm-9">
											<select id="customer_name" name="customer_name" data-valid="required" class="form-control select2bs4" style="width: 100%;">
												<option value="">Select Customer</option>
												@foreach(\App\Contact::all() as $clist)
													<option value="{{@$clist->id}}" @if($fetchedData->customer_id == $clist->id) selected @endif>{{@$clist->first_name}} {{@$clist->last_name}}</option>
												@endforeach
											</select>

											<?php $currencydata = \App\Currency::where('id',$fetchedData->currency_id)->first(); ?>
												<span class="currencydata"><span class="badge badge-success text-semibold currencycode">{{$currencydata->currency_code}}</span><input type="hidden" name="currency_id" value="{{$currencydata->id}}"><input type="hidden" id="dec_type" value="{{$currencydata->decimal}}"></span>
											<div class="wrapper" id="wrpdata" style="display: none;">
												<a href="javascript:;" class="font-weight-300 addCustomermodel" >+ Add New Customer</a>
											</div>
											</div>
											@if ($errors->has('customer_name'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('customer_name') }}</strong>
												</span> 
											@endif
											</div>  
										</div>
									</div> 
								
								<div class="row" style="margin-top: 25px;">
									<div class="col-sm-12">
										<div class="addresslist" style="<?php if($fetchedData->customer_id != ''){ }else{ echo 'display:none;'; } ?> ">
										@if($fetchedData->customer_id != '')
											<?php $cusdetail = \App\Contact::where('id',$fetchedData->customer_id)->first(); ?>
											<span style="">Billing Address <a href="javascript:;" id="{{$cusdetail->id}}" class="change_address">Change</a></span>
											<address style="" id="">{{$cusdetail->address}}<br>{{$cusdetail->city}}<br>{{$cusdetail->zipcode}}<br>{{$cusdetail->country}}<br>{{$cusdetail->phone}}</address>
											<script>
										
												billingdata[0] = {
												"customer_id":'<?php echo $cusdetail->id; ?>',
												"address":'<?php echo $cusdetail->address; ?>',
												"city":'<?php echo $cusdetail->city; ?>',
												"zipcode":'<?php echo $cusdetail->zipcode; ?>',
												"phone":'<?php echo $cusdetail->phone; ?>',
												"country":'<?php echo $cusdetail->country; ?>',
													}
											</script>
										@endif
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group row"> 
										
											<label for="invoice" class="col-sm-3 col-form-label">Invoice# <span style="color:#ff0000;">*</span></label>
											<div class="col-sm-9">
											{{ Form::text('invoice', @$fetchedData->invoice, array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'INV - 00855*','disabled'=>'disabled' )) }}
											@if ($errors->has('invoice'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('invoice') }}</strong>
												</span> 
											@endif
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group row"> 
											<label for="order_no" class="col-sm-3 col-form-label">Order Number</label>
											<div class="col-sm-9">
											{{ Form::text('order_no', @$fetchedData->order_id, array('class' => 'form-control', 'autocomplete'=>'off','placeholder'=>'Order Number' )) }}
											@if ($errors->has('order_no'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('order_no') }}</strong>
												</span> 
											@endif
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">										
										<div class="form-group row">
											<label for="invoice_date" class="col-sm-3 col-form-label">Invoice Date</label>
											<div class="col-sm-9">
											{{ Form::text('invoice_date', @$fetchedData->invoice_date, array('class' => 'form-control commodate', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Invoice Date' )) }}
											@if ($errors->has('invoice_date'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('invoice_date') }}</strong>
												</span> 
											@endif
											</div>
										</div>
									</div>
									<div class="col-sm-6">										
										<div class="form-group row">
											<label for="terms" class="col-sm-3 col-form-label">Terms</label>
											<div class="col-sm-9">
											<select name="terms" class="form-control select2bs4" style="width: 100%;">
												<option value="Net 15" @if($fetchedData->terms == "Net 15") selected @endif>Net 15</option>
												<option value="Net 30" @if(@$fetchedData->terms == "Net 30") selected @endif>Net 30</option>
												<option value="Net 45" @if(@$fetchedData->terms == "Net 45") selected @endif>Net 45</option>
												<option value="Net 60" @if(@$fetchedData->terms == "Net 60") selected @endif>Net 60</option>
												<option value="Due end of the month" @if(@$fetchedData->terms == "Due end of the month") selected @endif>Due end of the month</option>
												<option value="Due end of next month" @if(@$fetchedData->terms == "Due end of next month") selected @endif>Due end of next month</option>
												<option value="Due on Receipt" @if(@$fetchedData->terms == "Due on Receipt") selected @endif>Due on Receipt</option>
												<option value="Custom" @if(@$fetchedData->terms == "Custom") selected @endif>Custom</option>
											</select>
											@if ($errors->has('terms'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('terms') }}</strong>
												</span> 
											@endif
											</div>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-sm-6">										
										<div class="form-group row">
											<label for="due_date" class="col-sm-3 col-form-label">Due Date</label>
											<div class="col-sm-9">
											{{ Form::text('due_date', @$fetchedData->due_date, array('class' => 'form-control commodate', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'Invoice Date' )) }}
											@if ($errors->has('due_date'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('due_date') }}</strong>
												</span> 
											@endif
											</div>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive invoice_item_table">
											<table id="itemsdetail" class="table table-bordered text-nowrap">
												<thead>
													<tr>
														<th>Item Details</th>
														<th>Quantity</th>
														<th>Rate</th>
														<th>Amount</th>
													</tr> 
												</thead>
												<tbody>
												<tr class="item_row" style="display:none;">
													<td>
														<div class="form-group">
															<!--<textarea class="form-control" placeholder="Type or click to select an item." name="item_detail"></textarea>-->
															<select id="" name="item_detail[]" class="select2dat" style="width: 100%;">
																<option value="">Type or click to select an item.</option>
																@foreach(\App\Item::where('user_id', @Auth::user()->id)->orderby('name','ASC')->get() as $ilist)
																	<option value="{{$ilist->name}}">{{$ilist->name}}</option>
																@endforeach
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text"  class="form-control qty" value="1.00" placeholder="" name="quantity[]" />
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text"  class="form-control rate" value="0.00" placeholder="Rate" name="rate[]" />
														</div>
													</td>
													<td class="last_item_col">
														<div class="form-group">
															<input type="text" value="0.00" class="form-control amount" placeholder="Amount" name="amount" disabled />
														</div>
														<div class="item_action">
															<!--<a class="item_clone" href="javascript:;"><i class="fa fa-copy"></i></a>-->
															<a class="item_remove" href="javascript:;"><i class="fa fa-close"></i></a>
														</div>
													</td>
													</tr>
													<?php $subtotl = 0; ?>
													@foreach(\App\InvoiceDetail::where('invoice_id',@$fetchedData->id)->get() as $ilist)
													<tr class="tr_clone">
														<td>
															<div class="form-group">
																<!--<textarea class="form-control" placeholder="Type or click to select an item." name="item_detail"></textarea>-->
																<select id="" name="item_detail[]" class="select2dat"  style="width: 100%;">
																	<option value="">Type or click to select an item.</option>
																	@foreach(\App\Item::where('user_id', @Auth::user()->id)->orderby('name','ASC')->get() as $itlist)
																		<option value="{{$itlist->name}}" @if($ilist->item_name == $itlist->name) selected @endif>{{$itlist->name}}</option>
																	@endforeach
																</select>
															</div>
														</td>
														<td>
															<div class="form-group">
																<input type="text" class="form-control qty" value="{{number_format(@$ilist->quantity, $currencydata->decimal,'.', '')}}" name="quantity[]" />
															</div>
														</td>
														<td>
															<div class="form-group">
																<input type="text" class="form-control rate" value="{{number_format(@$ilist->rate, $currencydata->decimal,'.', '')}}" name="rate[]" />
															</div>
														</td>
														<td class="last_item_col">
															<div class="form-group">
															<?php 
																$amt = $ilist->rate * $ilist->quantity; 
																$subtotl += $amt;
															?>
																<input type="text" class="form-control amount" value="{{number_format(@$amt, $currencydata->decimal)}}" name="amount" disabled />
															</div>
															<div class="item_action">
																<!--<a class="item_clone" href="javascript:;"><i class="fa fa-copy"></i></a>-->
																<a class="item_remove" href="javascript:;"><i class="fa fa-close"></i></a>
															</div>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div> 
										<div class="add_new_row">
											<button type="button" class="btn btn-outline-primary btn-sm" id="add_new_row">Add New Row</button>											
										</div>
									</div>
								</div>
								<div class="row" style="align-items: flex-end;">
									<div class="col-sm-6">
										<div class="form_group">
											<label for="customer_note" class="col-form-label">Customer Notes</label>
											<textarea class="form-control" name="customer_note" placeholder="Thanks for your business.">{{@$fetchedData->customer_note}}</textarea>
											@if ($errors->has('customer_note')) 
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('customer_note') }}</strong>
												</span> 
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="sub_total">
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Sub Total</label>
												<div class="col-sm-9 text-right">
													<span class="subtotal">{{number_format($subtotl,$currencydata->decimal)}}</span>
												</div> 
											</div>
											<div class="form-group row">
												<label for="" class="col-sm-3 col-form-label">Discount</label>
												<div class="col-sm-4">
													<div class="discount_field">
														<input type="text" class="discount" name="discount" value="{{$fetchedData->discount}}"/>
														<button class="btn btn-default dropdown-toggle currecysign showdiscounttype" data-toggle="dropdown" aria-expanded="false">@if($fetchedData->discount_type == 'percentage') % @else {{$currencydata->currency_symbol}} @endif <span class="caret"></span></button>
														<div class="dropdown-menu" x-placement="top-start">
															<a class="dropdown-item selectdiscount" dataid="percentage" tabindex="-1" href="javascript:;">%</a>
															<a class="dropdown-item currecysign selectdiscount" dataid="fixed" tabindex="-1" href="javascript:;">{{$currencydata->currency_symbol}}</a>
															<input type="hidden" value="<?php if($fetchedData->discount_type == 'percentage'){ echo 'percentage'; }else{ echo 'fixed'; } ?>" name="disc_type" class="disc_type">
														</div>
													</div>
												</div>
												<div class="col-sm-5 text-right">
												<?php 
													if($fetchedData->discount_type == 'percentage'){
														$dic = ($subtotl * $fetchedData->discount) / 100;
														$finaltotal = $subtotl - $dic;
														
													}else{
														$finaltotal = $subtotl - $fetchedData->discount;
														$dic = $fetchedData->discount;
													}
												?>
													<span class="discountsho">{{number_format($dic, $currencydata->decimal)}}</span>
												</div>
												
											</div>
											<?php $isec = \App\TaxRate::where('id',@$fetchedData->tax)->exists(); ?>
											@if(@Auth::user()->is_business_gst == 'yes' && $isec)
													<?php 
													$cure = \App\TaxRate::where('id',$fetchedData->tax)->first();
														$taxcal = ($finaltotal * $cure->rate) / 100;
														$finaltotal = $finaltotal + $taxcal;
												?>
													<div class="form-group row taxdetail" style="">
													<label for="" class="col-sm-3 col-form-label taxname">{{@$cure->name}} [{{@$cure->rate}}%]</label>
													<div class="col-sm-9 text-right">
														<span class="taxprice">{{number_format($taxcal, $currencydata->decimal)}}</span>
													</div> 
												</div>
													
												@else
												<div class="form-group row taxdetail" style="display:none;">
													<label for="" class="col-sm-3 col-form-label taxname"></label>
													<div class="col-sm-9 text-right">
														<span class="taxprice">0.00</span>
													</div> 
												</div>
												@endif
											<div class="form-group row total_amount">
												<label for="" class="col-sm-3 col-form-label">Total ({{$currencydata->currency_symbol}})</label>
												<div class="col-sm-9 text-right">
													<span class="finaltotal">{{number_format($finaltotal, $currencydata->decimal)}}</span>
												</div> 
											</div>
										</div>  
									</div> 
								</div>
								<div class="term_condition_sec">
									<div class="row">
										<div class="col-sm-8">
											<div class="form-group">
												<label for="term_condition" class="col-form-label">Terms &  Conditions</label>
												<textarea class="form-control" name="term_condition" placeholder="Enter the terms and conditions of your business to be displayed in your transaction">{{@$fetchedData->term_condition}}</textarea>	
												@if ($errors->has('term_condition')) 
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('term_condition') }}</strong>
													</span> 
												@endif
											</div>
										</div>
										<div class="col-sm-4">	
										{{-- <div class="form-group upload_invoice">
												<label for="attach_file" class="col-form-label">Attach File(s) to Invoice</label>
												<div class="upload_btn">
													<input type="file" name="attach_file"/>
													<i class="fa fa-upload"></i>
												</div>
												<button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Upload File <span class="caret"></span></button>
													<div class="dropdown-menu" x-placement="top-start">
														<a class="dropdown-item" tabindex="-1" href="#">Attach from Desktop</a>
														<a class="dropdown-item" tabindex="-1" href="#">Attach from Cloud</a>
														<a class="dropdown-item" tabindex="-1" href="#">Attach from Documents</a>
													</div>
												<span class="file_note">You can upload a maximum of 10 files, 5MB each</span>
												@if ($errors->has('attach_file')) 
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('attach_file') }}</strong>
													</span> 
												@endif
											</div> --}}
										</div>
									</div>
								</div>					
											<input id="save_type" name="save_type" type="hidden" value="save_send_later">
								<div style="margin-bottom:0px;" class="form-group float-right invoice_save_btn">
									{{ Form::button('<i class="fa fa-save"></i> Save', ['class'=>'btn btn-primary', 'onClick'=>'customValidate("edit-invoice")' ]) }}
									<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"></a>
									<div class="dropdown-menu" x-placement="top-start">
										<a savetype="save_print" class="dropdown-item" tabindex="-1" href="javascript:;" onClick='customInvoiceValidate("edit-invoice", "save_print")'><i class="fa fa-print"></i> Save & Print</a>
										
										<a savetype="save_send" class="dropdown-item" tabindex="-1" href="javascript:;" onClick='customInvoiceValidate("edit-invoice", "save_send")'><i class="fa fa-envelope"></i> Save & Send</a>
										
										<a savetype="save_share" class="dropdown-item" tabindex="-1" href="javascript:;" onClick='customInvoiceValidate("edit-invoice", "save_share")'><i class="fa fa-share"></i> Save & Share</a>
										
										<a savetype="save_send_later" class="dropdown-item" tabindex="-1" href="javascript:;" onClick='customInvoiceValidate("edit-invoice", "save_send_later")'><i class="fa fa-times"></i> Save & Send Later</a>
									</div>
									<button type="button" class="btn btn-default cancel_btn">Cancel</button>
									<div class="clearfix"></div>
								</div> 
							{{ Form::close() }}   
						</div> 
					</div>	
				</div>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="addCustomermodel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Customer</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
			</div>
			{{ Form::open(array('url' => 'admin/contact/add', 'name'=>"add-customer", 'autocomplete'=>'off', "enctype"=>"multipart/form-data", 'id'=>'addcustomer')) }}
			<div class="modal-body">
				<div class="customerror"></div>
				<div class="form-group row">  
					<label for="srname" class="col-sm-2 col-form-label">Primary Name <span style="color:#ff0000;">*</span></label>
					<div class="col-sm-1">
						<select style="padding: 0px 5px;" name="srname" id="srname" class="form-control" autocomplete="new-password">
							<option value="Mr">Mr</option>
							<option value="Mrs">Mrs</option>
							<option value="Ms">Ms</option>
							<option value="Miss">Miss</option>
							<option value="Dr">Dr</option>
						</select>
						<span class=""></span>
					</div>
					<div class="col-sm-3">
					{{ Form::text('first_name', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'First Name *' )) }}
					</div>
					<div class="col-sm-3">
						{{ Form::text('middle_name', '', array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'Middle Name' )) }}
					</div>
					<div class="col-sm-3">
					{{ Form::text('last_name', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Last Name *' )) }}
					</div>  
				</div>	
				<div class="form-group row">
					<label for="company_name" class="col-sm-2 col-form-label">Company Name <span style="color:#ff0000;">*</span></label>
					<div class="col-sm-10">
						{{ Form::text('company_name', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Company Name *' )) }}
					</div>
				</div>
				<div class="form-group row"> 
					<label for="contact_display_name" class="col-sm-2 col-form-label">Contact Display Name <span style="color:#ff0000;">*</span></label>
					<div class="col-sm-10">
					{{ Form::text('contact_display_name', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Contact Display Name *' )) }}
					</div>
				</div>
				<div class="form-group row"> 
					<label for="contact_email" class="col-sm-2 col-form-label">Contact Email <span style="color:#ff0000;">*</span></label>
					<div class="col-sm-10">
					{{ Form::text('contact_email', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Contact Email *' )) }}
					</div>
				</div>
				<div class="form-group row"> 
					<label for="contact_phone" class="col-sm-2 col-form-label">Contact Phone <span style="color:#ff0000;">*</span></label>
					<div class="col-sm-10">
					{{ Form::text('contact_phone', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Contact Phone *' )) }}
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="button" id="customer_save" class="btn btn-primary">Save</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<div class="modal fade" id="billing_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Billing Address</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
			</div>
			{{ Form::open(array('url' => 'admin/contact/storeaddress', 'name'=>"add-billingdetail", 'autocomplete'=>'off', "enctype"=>"multipart/form-data", 'id'=>'updatebillingdetail')) }}
			<div class="modal-body">
				
					<input type="hidden" value="" name="customer_id" id="customer_id">
					<div class="customerror"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="subject" class="col-form-label">Country</label>
								<div name="country" class="country_input" id="select_country" data-input-name="country"></div>
							</div>
							<div class="form-group">
								<label for="address" class="col-form-label">Address</label>
								<textarea name="address" id="address" class="form-control" placeholder="Address" style="width: 100%; height:80px;padding: 10px;margin-bottom:10px;"></textarea>
							</div>
							<div class="form-group">
								<label for="city" class="col-form-label">City</label>
								{{ Form::text('city', '', array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'City Name','id'=>'city' )) }}
							</div>
							<div class="form-group">
								<label for="zipcode" class="col-form-label">ZipCode</label>
								{{ Form::text('zipcode', '', array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'Zipcode','id'=>'zipcode' )) }}
							</div>
							<div class="form-group">
								<label for="phone" class="col-form-label">Phone</label>
								{{ Form::text('phone', '', array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'Phone','id'=>'phone' )) }}
							</div>
						</div>
					</div>.
				
			</div>
			<div class="modal-footer justify-content-between">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button type="button" id="billing_save" class="btn btn-primary">Save</button>
				</div>
				{{ Form::close() }}
		</div>
	</div>
</div>
@endsection