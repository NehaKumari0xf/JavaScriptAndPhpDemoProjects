
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expression Conversion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--for colours-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--for alert message-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function isOperator(sym)
    {
        if(sym==='+'||sym==="-"||sym==="*"||sym==='/'||sym=='('||sym===')'||sym==='^')
        return true;
        else
        return false;
    }
    function getPrecedenceOf(sym)
    {
        if(sym==="("||sym===")")
        return 4;
        else if(sym==="^")
        return 3;
        else if(sym==="*"||sym==="/")
        return 2;
        else
        return 1;
    }

    function isValidExpression(exp)//here data type not works make variable with the help of var.
{
    
	var i, totalOpeningParanthesis, totalClosingParanthesis;
	var previousCharacter;
	
    if(exp.charAt(0)!='(' && isOperator(exp.charAt(0)))
	{
		return 0;
	}
	
    if(exp.charAt(0)=='(') totalOpeningParanthesis++;
	previousCharacter=exp.charAt(0);
	for(i=1;i<exp.length;i++)
	{
		if(isOperator(exp.charAt(i)))
		{
			if(exp.charAt(i)=='(') totalOpeningParanthesis++;
			if(exp.charAt(i)==')') totalClosingParanthesis++;
	
			if(exp.charAt(i)=='(') 
			{
				if(!isOperator(previousCharacter)) return i;
			}
			else if(exp.charAt(i)==')')
			{
				if(previousCharacter!=')' && isOperator(previousCharacter)) return i;
			}
			else 
			{
				if(previousCharacter!=')' && isOperator(previousCharacter)) return i;
			}
		}
		previousCharacter=exp.charAt(i);
	}
	
	if(totalOpeningParanthesis!=totalClosingParanthesis) return -1;
	//expression should not ends with any expression except )
    //get the last character of expression
    var lastChar=exp.charAt(exp.length-1);
    if(lastChar!=')'&&isOperator(lastChar))
    return exp.lenght-1;
    return -2;
    
}


    function addHeadingToTable()
    {
        
        //add heading in table
        var thead=document.getElementById("thead");
        //create new row
        var row=document.createElement("tr");
        //create 1st column
        var col1=document.createElement("th");
        //create text for 1st column
        var col1Text=document.createTextNode("Scanned Symbol");
        col1.appendChild(col1Text);
        
        //create 2nd column
        var col2=document.createElement("th");
        //create text for 2nd column
        var col2Text=document.createTextNode("Operator Stack");
        col2.appendChild(col2Text);
        //create 3rd column
        var col3=document.createElement("th");
        //create text for 3rd column
        var col3Text=document.createTextNode("Postfix");
        col3.appendChild(col3Text);

        //append all 3 columns to row
        row.appendChild(col1);
        row.appendChild(col2);
        row.appendChild(col3);

        //append row to thead
        thead.appendChild(row);
    }

    function addStep(scannedSymbol,operatorStack,postfix)
    {
        var tbody=document.getElementById("tbody");
        var row=document.createElement("tr");
        var td1=document.createElement("td");
        var td2=document.createElement("td");
        var td3=document.createElement("td");
        var td1text=document.createTextNode(scannedSymbol);
        var td2text=document.createTextNode(operatorStack.join());
        var td3text=document.createTextNode(postfix);
        td1.appendChild(td1text);
        td2.appendChild(td2text);
        td3.appendChild(td3text);
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        tbody.appendChild(row);

    }
    function clearTable()
    {
        document.getElementById("thead").innerHTML="";
        document.getElementById("tbody").innerHTML="";
    }

    function convertToPrefix()
    {
        //get infix expression
        var infix=document.getElementById("inexp").value;
        if(infix==="")
        {
            alert("Please enter infix expression");
            document.getElementById("inexp").focus();
            return;
        }
        
        //check expression for validity
        clearTable();
        addHeadingToTable();

        var stack=[];
        var postfix="";
        var revInfix=infix.split('').reverse().join('');
         
        //replace ( with ) and ) with (
        revInfix=revInfix.split('');
         for(var i=0;i<revInfix.length;i++)
         {
            if(revInfix[i]==='(')
            revInfix[i]=')';
            else if(revInfix[i]===')')
            revInfix[i]='(';
         }
         revInfix=revInfix.join('');

        //alert(revInfix);
        for(i=0;i<revInfix.length;i++)
        {
            var scannedSymbol=revInfix[i];
            if(isOperator(scannedSymbol))
            {
                if(scannedSymbol==='(')
                stack.push(scannedSymbol);
                else if(scannedSymbol===')')
                {
                    //pop symbol from stack and append to postfix till ( found
                    do{
                        var poppedSymbol=stack.pop();
                        if(poppedSymbol==="(")break;
                        postfix+=poppedSymbol;

                    }while(true);
                }
                else{
                    var pushed=false;
                    do{
                        if(stack.length==0)
                        {
                            //stack is empty so, push scannedsymbol to stack
                            stack.push(scannedSymbol);
                            pushed=true;
                         }
                        else{
                            var topOperator=stack.pop();
                            if(topOperator==="(")
                            {
                                stack.push(topOperator);
                                stack.push(scannedSymbol);
                                pushed=true;
                            }
                            else if(getPrecedenceOf(topOperator)<=getPrecedenceOf(scannedSymbol))
                            {
                                stack.push(topOperator);
                                stack.push(scannedSymbol);
                                pushed=true;
                            }
                            else
                            {
                                //append topOperator to postfix
                                postfix+=topOperator
                            }
                    }
                }while(!pushed);
                }

            }
            else
            {
                postfix+=revInfix[i];
            }

            addStep(scannedSymbol,stack,postfix);
        }

        //pop all operators from stack and append to postfix
        do
        {
            var poppedSymbol=stack.pop();
            if(poppedSymbol==undefined)break;
            postfix+=poppedSymbol;

        }while(true);
        addStep("",[],postfix);
        postfix=postfix.split('').reverse().join('');
        addStep("Prefix",[],postfix);

    } 
    function convertToPostfix()
    {
        //get infix expression
        var infix=document.getElementById("inexp").value;
        if(infix==="")
        {
            alert("Please enter infix expression");
            document.getElementById("inexp").focus();
            return;
        }

        //check expression for validity
        clearTable();

        addHeadingToTable();

        var stack=[];
        var postfix="";
        for(i=0;i<infix.length;i++)
        {
            var scannedSymbol=infix[i];
            if(isOperator(scannedSymbol))
            {
                if(scannedSymbol==='(')
                stack.push(scannedSymbol);
                else if(scannedSymbol===')')
                {
                    //pop symbol from stack and append to postfix till ( found
                    do{
                        var poppedSymbol=stack.pop();
                        if(poppedSymbol==="(")break;
                        postfix+=poppedSymbol;

                    }while(true);
                }
                else{
                    var pushed=false;
                    do{
                        if(stack.length==0)
                        {
                            //stack is empty so, push scannedsymbol to stack
                            stack.push(scannedSymbol);
                            pushed=true;
                         }
                        else{
                            var topOperator=stack.pop();
                            if(topOperator==="(")
                            {
                                stack.push(topOperator);
                                stack.push(scannedSymbol);
                                pushed=true;
                            }
                            else if(getPrecedenceOf(topOperator)<getPrecedenceOf(scannedSymbol))
                            {
                                stack.push(topOperator);
                                stack.push(scannedSymbol);
                                pushed=true;
                            }
                            else
                            {
                                //append topOperator to postfix
                                postfix+=topOperator
                            }
                    }
                }while(!pushed);
                }

            }
            else
            {
                postfix+=infix[i];
            }

            addStep(scannedSymbol,stack,postfix);
        }

        //pop all operators from stack and append to postfix
        do
        {
            var poppedSymbol=stack.pop();
            if(poppedSymbol==undefined)break;
            postfix+=poppedSymbol;

        }while(true);
        addStep("",[],postfix);
        addStep("Postfix",[],postfix);
    }
    function submitChoice() {
    var selectedValue = document.getElementById("buttonSelect").value;
    //check the expression is valid or not
    //expression
    var exp=document.getElementById("inexp").value;
    if(isValidExpression(exp)!=-2)
    {
        alert("Invalid expression.");
        return ;
    }
    if (selectedValue === "postfix") {
        convertToPostfix();
    } else if (selectedValue === "prefix") {
        convertToPrefix();
    }
    }
  </script>
  
</head>
<body >
    <section >
        <div class="container mt-5 pt-3">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto ">
                <div class="card border-1 ">
                <div class="card-body">
                <div class="text-center  py-3">  
                    <h1 class="text-info"><u>Expression Conversion</u></h1>
                </div>
                
            <input type="text" name="inexp" id="inexp" class="form-control my-4 " placeholder="Enter valid Infix Expression: " required/>
            <div class="row py-3">
                <div class="col-sm-6  ">
                     <select id="buttonSelect" class="form-select">
                        <option class="text-info" value="postfix"> Convert To Postfix </option>
                        <option value="prefix"> Convert To Prefix </option>
                    </select>
                </div> 
            <div class="col-sm-6">
                <input type="submit" class="form-control bg-info text-white" onclick="submitChoice()" value="Ok">
            </div>
        </div>      
        <div class="row">
            <div class="col-sm-12 my-3">
                <table class="table table-bordered table-hover table-sm" id="solnTable">
                    <thead id="thead"></thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
</body>
</html>