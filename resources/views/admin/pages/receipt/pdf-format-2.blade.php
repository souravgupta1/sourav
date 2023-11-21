<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .box{
        margin: 5%;
        padding: 1%;
        border: 1px solid black;
    }
    .border{
        padding: 4px;
        border:1px solid black;
    }
    .float-right{
        float: right;
    }
    .float-left{
        float: left;
    }
    *{
        font-family: sans-serif;
    }
    .dashed{
        border-bottom:1px dashed black
    }
    .f13{
        font-size: 13px;
    }
    .fRight{
        text-align: right;
    }
    .fCenter{
        text-align: center;
    }
    .pt-10{
        padding-top: 10px;
    }
    .logo{
        position: absolute;
        width: 20%;
        float: right;
        margin-top: 40px;

    }

    </style>
</head>
<body>
<div class="box" >




<img class="logo" src="https://disha.vedvika.com/assets/images/logo/logo.png">

    <table style="margin-top: 5%">

        <tr><td colspan="4" class="fCenter" ><b>{{ session('company')->company_name }}</b></td></tr>
        <tr><td colspan="4" class="fCenter f13"  ><b> Reg. Trust No. {{ session('company')->com_reg_no }}</b></td></tr>
        <tr><td colspan="4" class="fCenter f13" style="padding-bottom: 20px" >{{ session('company')->city }} {{ session('company')->state }} {{ session('company')->country }} {{ session('company')->pincode }}</td></tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">
                <div class=" f13 fRight" >Receipt No.: <b>{{ $receipt->receipt_no }}</b></div>
                <div  class=" f13 fRight" >Location: <b>{{ session('company')->city }}</b></div>
            </td>
        </tr>
        <tr>
            <td class="f13">Donated by :</td>
            <td colspan="3" class="dashed f13" >{{ $funder->funder_name }}</td>
        </tr>
        <tr>
            <td class="f13">Address :</td>
            <td colspan="3" class="dashed f13" > {{ "$funder->funder_address1 $funder->funder_address2 $funder->funder_city $funder->funder_state $funder->funder_country $funder->funder_pin" }}</td>
        </tr>
        <tr>
            <td class="f13">Date of donation :</td>
            <td colspan="3" class="dashed f13" >{{ $receipt->receipt_date }}</td>
        </tr>
        <tr>
            <td class="f13">Donated vai :</td>
            <td colspan="3" class="dashed f13" >{{ $receipt->transfer_mode }}</td>

        </tr>
         <tr>
            <td class="f13">Donated Amount :</td>
            <td colspan="3" class="dashed f13" >{{ $word }} Only</td>
        </tr>
        <tr ><td style="padding-top: 10px;"></td></tr>
        <tr >
            <td colspan="3" class="fRight f13" ><b>Authorized signature: </b></td>
            <td class="dashed f13"></td>
        </tr>
        {{-- <tr>
        <td colspan="4" class="fRight f13 pt-10">Chartered Accountant</td>
        </tr> --}}
        <tr>
            <td class="f13" style="padding-top:40px" colspan="4">{{ $setting->footer }}</td>
        </tr>


    </table>
</div>
    </div>
</body>
</html>
