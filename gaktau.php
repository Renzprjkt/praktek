<html>
<script language="javascript">
function openView()
{
newWindow= window.open(" ",'sign.php','scrollbars=yes,toolbar=no,width=250,height=200');
newWindow.self.location='sign.php?key=usr';}

function openViewLogin()
{
newWindow= window.open(" ",'formanggota.php','scrollbars=yes,toolbar=no,width=500,height=400');
newWindow.self.location='formanggota?key=usr';}
</script>
<head>

<link rel="stylesheet" href="images/product.css" type="text/css" />

<title>Product Sate</title>
	
</head>
<body>
        <!-- header -->
    <header>
        <div class="search">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
    </header>

    <!-- slider -->

    <div class="slider">
        <!-- list Items -->
        <div class="list">
            <div class="item active">
                <img src="image/img1.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 01</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img2.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 02</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img3.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 03</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img4.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 04</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img5.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 05</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                    </p>
                </div>
            </div>
        </div>
        <!-- button arrows -->
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- thumbnail -->
        <div class="thumbnail">
            <div class="item active">
                <img src="image/img1.jpg">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="image/img2.jpg">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="image/img3.jpg">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="image/img4.jpg">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="image/img5.jpg">
                <div class="content">
                    Name Slider
                </div>
            </div>
        </div>
    </div>


    <script src="product.js"></script>
</body>
</html>