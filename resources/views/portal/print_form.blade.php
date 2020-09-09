<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .print-container{
            width: 70%;
            margin: auto;
        }
        .exam-title{
            text-align: center;
        }
        .user_info{
            width: 50%;
            float: left;
            height: 50px;
            line-height: 50px;
            text-align: center;
        }
        .user-info-block{
            margin-top: 70px;
        }
    </style>
</head>
<body>
        <div class="print-container">
            <div class="exam-title">
                <h3>{{$student->oex_exam_master->title}}</h3>
            </div>
           <div class="user-info-block">
                <div class="user_info">
                    <label>Name : {{$student->name}}</label>
                </div>
                <div class="user_info">
                    <label>E-mail : {{$student->email}}</label>
                </div>
                <div class="user_info">
                    <label>Mobile No : {{$student->mobile_no}}</label>
                </div>
                <div class="user_info">
                    <label>DOB: {{date('d M, Y',strtotime($student->dob))}}</label>
                </div>
           </div>
           <button class="btn-info" onclick="window.print()">print</button>
        </div>
</body>
</html>