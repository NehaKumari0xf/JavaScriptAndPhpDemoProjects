<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Operations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--for colours-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function sortString()
        {
            var inputString=document.getElementById("inputString").value;
            var char=inputString.split("");
            //char.sort();//short method of sorting
            var len=char.length;
            
            for(var i=0; i<len-1; i++)
            {
                for(var j=i+1; j<len; j++)
                {
                    if(char[i]>char[j])
                    {
                    //swap
                    var temp=char[i];
                    char[i]=char[j];
                    char[j]=temp;
                }
            }
        }            
            var sortedString=char.join("");
            var stringAnswer=document.getElementById("outputString");
            stringAnswer.innerHTML=sortedString;
        }
        function sortStringInDes()
        {
            var inputString=document.getElementById("inputString").value;
            var char=inputString.split("").sort().reverse().join("");
            var stringAnswer=document.getElementById("outputString");
            stringAnswer.innerHTML=char;
        }
        function reverseString()
        {
            var inputString=document.getElementById("inputString").value;
            var reversedString=inputString.split("").reverse().join("");
            var stringAnswer=document.getElementById("outputString");
            stringAnswer.innerHTML=reversedString;
        }
        function lowerCase()
        {
            var inputString=document.getElementById("inputString").value;
            var lcaseString=inputString.toLowerCase();
            var stringAnswer=document.getElementById("outputString");
            stringAnswer.innerHTML=lcaseString;
        }
        function upperCase()
        {
            var ucase=document.getElementById("inputString").value;
            var ucaseString=ucase.toUpperCase();
            var stringAnswer=document.getElementById("outputString");
            stringAnswer.innerHTML=ucaseString;
        }
        function convertString()
        {
            //testing string is valid or not
            var inputString=document.getElementById("inputString").value;
            
            if(typeof inputString!='string')
            {
                inputString.innerHTML=" not a string";
               return ;
            }
            var selectedOption=document.getElementById("selectedChoice").value;
            if(selectedOption==="sort")
            sortString();
            else if(selectedOption==="descSort")
            sortStringInDes();
            else if(selectedOption==="copy")
            copyString();
            else if(selectedOption==="append")
            appendString();
            else if(selectedOption==="find")
            findString();
            else if(selectedOption==="substring")
            substring();
            else if(selectedOption==="reverse")
            reverseString();
            else if(selectedOption==="ucase")
            upperCase();
            else if(selectedOption==="lcase")
            lowerCase();
            else if(selectedOption==="s2int")
            stringTOInt();
            else if(selectedOption==="int2s")
            intToString();
        }
    </script>
</head>
<body>
    <section>
    <div class="container mt-5 pt-3">
        <div class="row">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
        <div class="card border-1">    
            <div class="card-body">
                <div class="text-center py-3">
                    <h1 class="py-5 ">String Operations</h1>
                    <p id="validString"></p>
                </div>
            <input class="form-control" type="text" name="inputString" id="inputString" placeholder="Enter String" required/>
            <div class="row py-3 ">
                <div class="col-sm-6 ">
                <select id="selectedChoice" class="form-select">
                    <option value="copy">Copy Of String</option>
                    <option value="sort">Sort String In Asscending Order</option>
                    <option value="descSort">Sort String In Descending Order</option>
                    <option value="append">Append String</option>
                    <option value="find">Searching/Find Of String</option>
                    <option value="substring">Substring Of String</option>
                    <option value="reverse">Reverse Of String</option>
                    <option value="ucase">Uppercase Of String</option>
                    <option value="lcase">Lowercase Of String</option>
                    <option value="s2int">String To Intger Conversion</option>
                    <option value="int2s">Intger To String Conversion</option>
                </select> 
                </div>
                <div class="col-sm-6">
                    <input class="form-control " value="Convert" type="submit"  onclick="convertString()"/>
                </div>
            </div>
            <div id="outputString">
            </div>
        </div>
        </div>
    </div>
    </div>
    </section>
</body>
</html>





