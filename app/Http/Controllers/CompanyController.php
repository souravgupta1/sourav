<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyModel;
use App\Models\FunderModel;
use App\Models\ReceiptModel;
use Illuminate\Http\Request;
use App\Mail\ComposeMail;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{


    function CompanyView(){
            $company = CompanyModel::where('user_id',session('admin')->id)->first();
            return view('admin.pages.create-company',['company'=>$company]);
    }
    function ReceiptView(){
            $receiptCount = ReceiptModel::where('user_id', session('admin')->id)->count();
            $num = str_pad($receiptCount+1,3,0,STR_PAD_LEFT);
            $year = date('Y').'-'.(date('y')+1) ;
            $text = 'CA';
            $auto_receipt = "$text/$year/$num";
            return view('admin.pages.receipt.create-receipt',['receiptNumber'=>$auto_receipt]);
    }
    function ReceiptListView(){
        $receipt = ReceiptModel::all();
        return view('admin.pages.receipt.receipt-list',['receipt'=>$receipt]);
    }
    function FunderView(){
         return view('admin.pages.funder.create-funder');
    }
    function FunderListView(){
        $funder = FunderModel::all();
        return view('admin.pages.funder.funder-list',['funder'=>$funder]);
    }
    function CompanyRegistration(Request $request){
        $company = CompanyModel::where('user_id',session('admin')->id)->first();
        if(!$company){
            $company = new CompanyModel();
             $company->created_at = date('Y-m-d');
             $company->created_by = session('admin')->id;
        }

        $company->user_id = session('admin')->id;
        $company->email = $request->email;
        $company->company_name = $request->company_name;
        if($request->file('logo')){
            $company->logo = $request->file('logo')->store('company/'.$request->company_name.'/logo','public');
        }
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->pincode = $request->pincode;
        $company->mobile = $request->mobile;
        $company->pan = $request->pan;
        $company->com_reg_no = $request->com_reg_no;
        $company->com_type = $request->com_type;
        $company->com_file = 'NA';
        $company->has_12A = $request->has_12A;
        $company->has_12A_date = $request->has_12A_date;
        $company->number_12A = $request->number_12A;
        $company->has_80G = $request->has_80G;
        $company->has_80G_date = $request->has_80G_date;
        $company->number_80G = $request->number_80G;
        $company->updated_at = date('Y-m-d');
        $company->updated_by = session('admin')->id;

        if($company->save()){
            return redirect()->route('create-company')->with(['status'=>'Data updated']);
        }else{
             return redirect()->route('create-company')->with(['status'=>'Something went wrong']);
        }
    }
    function CompanyReceipt(Request $request){
        $recepit = ReceiptModel::where('user_id',session('admin')->id)->where('receipt_no', $request->receipt_no)->first();
        if(!$recepit){
            $receipt = new ReceiptModel();
            $receipt->created_at = now();
            $receipt->user_id = session('admin')->id;
            $receipt->created_by = session('admin')->id;
        }
        $receipt->user_id = session('admin')->id;
        $receipt->company_id = session('company')->id;
        $receipt->receiver = $request->receiver;
        $receipt->amount = $request->amount;
        $receipt->towards = $request->towards;
        $receipt->transfer_mode = $request->transfer_mode;
        $receipt->receipt_date = $request->receipt_date;
        $receipt->receipt_no = $request->receipt_no;

        $receipt->updated_at = now();
        $receipt->update_by = session('admin')->id;
        if($receipt->save()){
             return redirect()->route('create-receipt')->with(['status'=>'Receipt Generated']);
        }else{
             return redirect()->route('create-receipt')->with(['status'=>'Something went wrong']);
        }
    }
    function CompanyFunder(Request $request){
        $funder = new FunderModel();
        $funder->user_id = session('admin')->id;
        $funder->funder_type = $request->funder_type;
        $funder->funder_category = $request->funder_category;
        $funder->funder_entity = $request->funder_entity;
        $funder->funder_name = $request->funder_name;
        $funder->funder_middel = $request->funder_middel;
        $funder->funder_last = $request->funder_last;
        $funder->funder_nationality = $request->funder_nationality;
        $funder->funder_country = $request->funder_country;
        $funder->funder_state = $request->funder_state;
        $funder->funder_city = $request->funder_city;
        $funder->funder_pin = $request->funder_pin;
        $funder->funder_address1 = $request->funder_address1;
        $funder->funder_address2 = $request->funder_address2;
        $funder->funder_contact_name = $request->funder_contact_name;
        $funder->funder_contact_number = $request->funder_contact_number;
        $funder->funder_email = $request->funder_email;
        $funder->funder_website = $request->funder_website;
        $funder->funder_pan = $request->funder_pan;
        $funder->funder_pan_img =$request->file('funder_pan_img')->store('company/'.session('company')->company_name.'/funder/pan','public');
        $funder->funder_passport = $request->funder_passport;
        $funder->funder_passport_img = $request->file('funder_passport_img')->store('company/'.session('company')->company_name.'/funder/passport','public');
        $funder->funder_remark = $request->funder_remark;
        if($funder->save()){
            return redirect()->route('create-funder')->with(['status'=>'Funder Added']);
        }else{
            return redirect()->route('create-funder')->with(['status'=>'Something went wrong']);
        }
    }
    public function sendMail(Request $request){


        $data = array('subject'=>$request->subject,'from'=>$request->from,'to'=>$request->to,'cc'=>$request->cc,'body'=>$request->body);
        Mail::to($request->email)->send(new ComposeMail($data));

        return true;
    }

}
