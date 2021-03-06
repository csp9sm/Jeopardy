<?php 
	session_start();
	if(isset($_SESSION['website'])){
		$previous = $_SESSION['website'];
	}

	if($previous == "verification.php"){
		$_SESSION['post-data'] = $_SESSION['post-data'];
		$_SESSION['questionType']= $_SESSION['questionType'];
		$questionType = $_SESSION['questionType2'];
		//echo $questionType;
	}else{
		$previous = "";
		$questionType = "shortanswer";
	}
	$_SESSION['website'] = "jeopardyForm.php";

	//response.setContentType("text/html; charset=UTF-8");
	 // if(isset($_POST['textarea1'])){
  //       $_SESSION['textarea1'] = $_POST['textarea1'];
  //   }

?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">  
        <title>Jeopardy</title> 
        <link rel=stylesheet href="main.css" type="text/css">
        <script type="text/javascript" src="main.js"></script>
        <script type="text/javascript">
        	function checkFields (){
        		//alert("check fields!");
        		//alert(document.questionType.type.value);
        		var myQuestion = "<?php echo $questionType; ?>";
        		//alert(myQuestion);
        		//alert(document.TrueFalseForm.question3.value);
        		//function update_question(<?php echo $questionType; ?>);

        		//if((myQuestion== "shortanswer") && (document.shortAnswerForm.question1.value != "")){
        		if(myQuestion== "shortanswer"){
        			document.getElementById("optionType").value="shortanswer";
        			document.getElementById("shortA").style.display ="block";
        			document.getElementById("multipleC").style.display ="none";
        			document.getElementById("trueFalse").style.display ="none";	
        		}
        		//if((myQuestion == "multiplechoice") && (document.multipleChoiceForm.question2.value != "")){
        		if(myQuestion== "multiplechoice"){
        			document.getElementById("optionType").value="multiplechoice";
        			document.getElementById("multipleC").style.display ="block";
        			document.getElementById("shortA").style.display ="none";
        			document.getElementById("trueFalse").style.display ="none";	
        		}
        		//if((myQuestion == "truefalse") && (document.TrueFalseForm.question3.value != "")){
        		if(myQuestion== "truefalse"){
        			document.getElementById("optionType").value="truefalse";
        			document.getElementById("trueFalse").style.display ="block";	
        			document.getElementById("multipleC").style.display ="none";
        			document.getElementById("shortA").style.display ="none";
        		}
        	}
        </script>
	</head>

	<body onload="checkFields()">
		<!-- onload="checkFields()";-->
		<?php 
			//This is to ensure that if the information passed from the verification is filled in the inputs.
		?>
		<header><img id="banner" src="images/jeopardy_logo1.png" alt="Jeopardy Logo Banner"/></header>
		<div class="center">
			<h1>Welcome!</h1>

			<p>In this site you can create your own jeopardy game! Below, there is a submission form, where you can submit your questions and the corresponding answers for the game. You may create three types of questions: short-answer, multiple choice, or true/false.</p>

			<h2 class="underline" >Submission</h2>
		</div>
		
		<fieldset name="questionType" class="center">
			<legend align="center" style="font-size: 18px;">Select the type of question to create:</legend>
			<div id="selectType">
				<select name="type" id="optionType" onchange="update_question(this.value);">
					<!--value = "<?php echo $questionType; ?>"-->
					<option value="shortanswer">Short Answer</option>
					<option value="multiplechoice">Multiple Choice</option>
					<option value="truefalse">True/False</option>
				</select>
			</div>
			
			<br />
			 
			<form method="post" action="verification.php" name="shortAnswerForm" id="shortAnswerForm" onsubmit="return validateInput1()">
				
				<div id="shortA" style="display: none;">	
					<table class="center">
						<tr>
							<td><label for="question1">Question: </label></td>
							<td><input type="text" name="question1"></td>
						</tr>
						<tr>
							<td><label for="shortAnswer">Answer: </label></td>
							<td><textarea name="shortAnswer" form="shortAnswerForm" row="10" cols="18"></textarea></td>
						</tr>		
					</table>
					<br/>
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
				</div>
			</form>
<!-- 			<textarea type="text" name="shortAnswer" form="shortAnswerForm" rows="30" columns="50">Enter text here...</textarea> -->

			<form method="post" action="verification.php" name="multipleChoiceForm" onsubmit="return validateInput2()">

				<div id="multipleC" style="display: none;">					
					<table class="center">
						<tr>
							<td><label for="question2">Question: </label></td>
							<td><input type="text" name="question2"></td>
						</tr>
						<tr>
							<td><label for="multipleChoice1">Answer Choice A: </label></td>
							<td><input type="text" name="multipleChoice1"></td>
						</tr>
						<tr>
							<td><label for="multipleChoice2">Answer Choice B:</label></td>
							<td><input type="text" name="multipleChoice2"></td>
						</tr>
						<tr>
							<td><label for="multipleChoice3">Answer Choice C: </label></td>
							<td><input type="text" name="multipleChoice3"></td>
						</tr>
						<tr>
							<td><label for="multipleChoice4">Answer Choice D: </label></td>
							<td><input type="text" name="multipleChoice4"></td>
						</tr>
					</table>
					<p>Please select the correct answer choice.</p>
					<select name="mcChoice">
							<option value="Multiple Choice Answer A">Multiple Choice Answer A</option>
							<option value="Multiple Choice Answer B">Multiple Choice Answer B</option>
							<option value="Multiple Choice Answer C">Multiple Choice Answer C</option>
							<option value="Multiple Choice Answer D">Multiple Choice Answer D</option>
					</select>	
					<br /> 
					<br />
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
				</div>
			</form>

			<form method="post" action="verification.php" name=TrueFalseForm onsubmit="return validateInput3()">
				<div id="trueFalse" style="display:none;">
					<label for="question3">Question: </label>
					<input type="textarea" name="question3">		
					<br />
					<br />
					<input type="radio" name = "tfAnswer" value="True" checked>True
					<input type="radio" name = "tfAnswer" value="False" >False
					<br />
					<br />
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
				</div>
			</form>

		</fieldset>
		<img class="imgbanner" src="images/podiums.png" alt="Podium"/>

		<footer>Team: Cindy Park (csp9sm) and Sabina Yim (sjy8hy)</footer>
	</div>

	</body>
</html>