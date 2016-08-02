<html lang="en">
    <head>
		<title>Lexusinfra</title>
        <meta name="keywords" content="knaworld,lexusinfra,construction,civil companies,construction companies,engineering consultancy,consultancy,knaworld construction,civil construction,Top 10 construction company in Bhopal,Construction Company in Bhopal,Construction company in bhopal,top 10 construction company in bhopal,civil company,Bhopal,kna,knaworld,world,civil" />
		<meta name="description" content="Lexusinfra is an ISO 9001-2008 Certified Company based in Bhopal (M.P) providing Multi-disciplinary Engineering Consultancy Services across the country. Established in the year 2004 by an ambisious young Qualified Enginer, the company is now one of the fastest growing Consultany firms working in the field of engineering, environment and project management consultancy around the country. The Company comprises of extremly motivated and skilled Engineers, planners, support staff and technicians with vast experience in feasibility studies, design, developement and implimentation of project there by contributing to the sucess of our client throught Excellent Technical and Managerial know-how." />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        <link rel="icon" href="<?=base_url();?>images/ico/knaworld.ico" type="image/x-icon"> 
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="<?=base_url();?>css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="<?=base_url();?>js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="<?=base_url();?>css/templatemo_style.css"  rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <![endif]-->
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
         <script language=Javascript>
         
         function uploadCVActive()
         {
			$('#contactActive').removeClass('active');
			$('#uploadCV').addClass('active');
         }
         function onlynumber(evt)
         {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
             return true;
         }
      </script>
      <!--------------------------------------------start java script validation---------------------------------------------------->
   
      <script>
      function mobileValidation()
    	{
    	  var mobile = document.getElementById('mobile').value;//alert(mobile.length);return false;
    	  if(mobile.length<10)
    	  {
    		  document.getElementById('mobile_error').innerHTML="<h5>Please Enter Valide Mobile Number</h5>";
              return false;
    	  }
    	  else
    	  {
    		  $('#mobile_error').hide();
    	  }
    	}
      function val()
      {
      var name = document.getElementById('name').value;
      if(name== "")
      {
          document.getElementById('name_error').innerHTML= "<h5>Please Enter Your Name</h5>";
          return false;
      }
      
     
      if(mobile== "")
      {
          $('#name_error').hide();
         document.getElementById('mobile_error').innerHTML="<h5>Please Enter Valide Mobile Number</h5>";
          return false;
      }
      
      var email = document.getElementById('email').value;
      if(email== "")
      {
    	  $('#mobile_error').hide();
       document.getElementById('email_error').innerHTML="<h5>Please Enter Email ID<h5>";
       return false;
      }
      
      var category = document.getElementById('category').value;
            
      if(category== "")
      {	
         $('#email_error').hide();
       document.getElementById('category_error').innerHTML="<h5>Please Select Category</h5>";
       
       return false;
      }
     /* var category_other = document.getElementById('category_other').value;
            
       if(category_other== "")
       {	
          $('#email_error').hide();
        document.getElementById('category_error').innerHTML="<h5>Please Select Category</h5>";

        return false;
       }*/
      var resume = document.getElementById('resume').value;
         if(resume== "")
      {
         $('#category_error').hide();
         document.getElementById('resume_error').innerHTML="<h5>Please Upload Your Current CV<h5>";

         return false;
      } 
        return true;
      }
     </script>
     <!------------------------------------------------End of java script validation----------------------------------------------------------------->
    </head>
    <body onload="uploadCVActive();">
         <div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                         <img src="<?=base_url();?>images/email.png" alt="email"/>
                            lexusinfratech@gmail.com
                    </div>

                    </div>
                 </div>
        </div>
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a href="<?=base_url();?>index.php" class="navbar-brand"><img src="<?=base_url();?>images/lexuslogogreen.png" alt="knaworld_logo" title="KNA WORLD" /></a>
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li><a href="#templatemo-top">HOME</a></li>
                                <li><a href="#templatemo-about">ABOUT</a></li>
                                <li><a href="#templatemo-portfolio">PROJECTS</a></li>
                                <li><a href="#templatemo-blog">SERVICES</a></li>
                                <li id="uploadCV"><a href="#templatemo-upload">UPLOAD CV</a></li>
                                <li id="contactActive"><a href="#templatemo-contact">CONTACT</a></li>   
                            </ul>
                            
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>