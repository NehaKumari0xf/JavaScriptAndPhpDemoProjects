<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--for colours-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<script>
    var records=[
        ["01","Andhra Pradesh","Amaravati","Y.S.Jagan Mohan Reddy"],
        ["02","Arunachal Pradesh","Itanagar","Pema Khandu "],
        ["03","Assam","Dispur","Himanta Biswa Sarma"],
        ["04","Bihar","Patna","Nitish Kumar"],
        ["05","Chhattisgarh","Naya Raipur/Bilaspur","Bhupesh Bhagel"],
        ["06","Goa","Panaji","Pramod Sawant"],
        ["07","Gujrat","Gandhinagar","Bhupendrabhai Patel"],
        ["08","Haryana","Chandigarh","Manohar Lal Khattar"],
        ["09","Himachal Pradesh","Shimla ","Sukhvinder Singh Sukhu"],
        ["10","Jharkhand","Ranchi","Hemant Soren"],
        ["11","Karnataka","Bengaluru","Sri Basavaraj Bommai"],
        ["12","Kerla","Thiruvananthapuram","Pinarayi Vijayan"],
        ["13","Madhya Pradesh (MP)","Bhopal","Shivraj Singh Chouhan"],
        ["14","Manipur","Imphal","N. Biren Singh"],
        ["15","Maharashtra","Mumbai","Eknath Sindhe"],
        ["16","Meghalaya","Shillong","Conrad Kongkal Sangma"],
        ["17","Mizoram","Aizawal","Zoramthanga"], 
        ["18","Nagaland","Kohima","Neiphiu Rio"],
        ["19","Odisha","Bhubaneswar","Naveen Patnaik"],
        ["20","Punjab","Chandigarh","Bhagwant Mann"],
        ["21","Rajasthan","Jaipur","Ashok Gehlot"],
        ["22","Sikkim","Gangtok","Prem Singh Tamang"],
        ["23","Tamil Nadu","Chennai","M.K.Stalin"],
        ["24","Telanagana","Hyderabad","K. Chandrashekhar Rao"],
        ["25","Tripura","Agartala","Manik Saha"],
        ["26","Uttar Pradesh (UP)","Lucknow","Yogi Adityanath"],
        ["27","Uttarakhand","Gairsan ","Pushkar Singh Dhami"],
        ["28","West Bangal","Kolkata","Mamata Banerjee "]
    ];
    function displayRecords()                            
    {
        var tbody=document.getElementById("info");
        for(let i=0; i<records.length; i++){
            let row=document.createElement("tr");
            for(let j=0; j<records[i].length; j++){
                let td=document.createElement("td");
                let textnode=document.createTextNode(records[i][j]);
                td.append(textnode);
                row.append(td);
            }tbody.append(row);
        }
    }
    
</script> 
<body onload="displayRecords();">
    <h1 class="text-center text-info py-3"><u>State, Capital and Chief Minister Name</u></h1>
    <table class="table table-bordered table-hover table-sm" >
        <thead class="bg-info text-light">
            <tr><th >Sr. no </th><th>State </th><th>Capital </th><th>Cheif Minister </th></tr>
        </thead>
        <tbody id="info">

        </tbody>
    </table>
</body>
</html>