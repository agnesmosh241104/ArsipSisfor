<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArsipSI</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head> 
<body>
        <div class="container"> 
        <div class="sidebar">
            <div class="logo"> 
                <img src="img/logo.jpg" alt="logo" width="150">    
            </div>
            <button class="create-new">+ Create New</button> 
            <img src="img/add.png" alt="add" width="30">
            <ul class="menu"> 
                <li><a href="#">Files</a></li>
                <img src="img/lib.png" alt="lib" width="30">
                <li><a href="#">Dashboard</a></li>
                <img src="img/dasboard.png" alt="dasboard" width="30">
 
            </ul>
        </div>  
        <!-- Main Content --> 
        <div class="main-content"> 

            <!-- Navbar -->
            <div class="top-bar">
                <div class="search-bar">
                    <input type="text" placeholder="Type here to search ......" />
                    <img src="img/search.png" alt="search" width="30">
                    <i class="search-icon"></i>

                </div>
                <div class="user-info">
                    <i class="notification-icon"></i>
                    <i class="settings-icon"></i>

                </div>
            </div>
           <!-- Header -->
 <div class="header">
    <div class="welcome-message">
        <P>My drive</P>  
        <img src="img/stat.png" alt="stat" width="20">
       
        <p></p>Welcome Alexa</p>
              <p>You have 22 new notifications</p>
    </div>
     <img src="img/yaho.png" alt="yaho" width="200">
</div> 
            <!-- Documents Section -->
            <div class="documents-section"> 
                <h3>Documents</h3>
                <div class="documents">
                    <div class="document">
                        <img src="img/pdf.png" alt="pdf" width="90">
                        <p>Working.pdf</p>
                    </div>
                    <div class="document">
                        <img src="img/docs.jpg" alt="docs" width="90">
                        <p>Template.docx</p>
                    </div>
                    <div class="document">
                        <img src="img/tos.jpg" alt="ppt" width="90">
                        <p>content.pptx</p>
                    </div>
                    <div class="document">
                        <img src="img/excel.jpg" alt="excel" width="90">
                        <p>calculate_box.xlsx</p>
                    </div>
                </div>
            </div> 

            <!-- Folders Section -->
            <div class="folders-section">
                <h3>Folders</h3>
                <div class="folders">
                    <div class="folder">
                    <img src= "img/lib.png" alt="wpu"  width="30">
                    <img src= "img/we.png" alt="wpu"  width="30">
                        <p>AI Workshop</p>
                        <p>15 Sept, 2024</p>
                        <p>5 files </p>
        	
                    </div>
                    
                    <div class="folder">
                    <img src= "img/lib.png" alt="wpu"  width="30">
                    <img src= "img/we.png" alt="wpu"  width="30">
                        <p>Source SI 22</p>
                        <p>8 August, 2024</p>
                        <p>32 files</p>
                       
                    </div>
                </div>
            </div>
            
        </div> <!-- End Main Content -->
    </div> <!-- End Container -->

</body>
</html>
