<?php
$href ="/index.php";
// session already started at another files
if(isset($_SESSION['cap_do']) ) {
    $href = "/admin/index.php";
    if (!isset($_SESSION['anh_dai_dien'])) {
        $anh_dai_dien = '../../admin/employees/photos/default.png';
    }else {
        $anh_dai_dien = '../../admin/employees/photos/' . $_SESSION['anh_dai_dien'];
    }
} else if (!isset($_SESSION['anh_dai_dien'])) {
    $anh_dai_dien = 'default.png';
}else $anh_dai_dien = $_SESSION['anh_dai_dien'];
?>
<div id="overlay"></div>
<div id="header">
    <div id="hamburger" onclick="logo(this)">
        <div id="hamburger_container">
              <div class="bar1"></div>
              <div class="bar2"></div>
              <div class="bar3"></div>
        </div>
    </div>
    <div id="logo">
    <a href=<?=$href?> >
            <img src="/resource/logo-white.png" >
        </a>
    </div>
    <div id="search_bar">
        <form>
<?php if (!isset($search)) 
$search = "";
// Prevent undefine when include header file in other index.php
?>
            <input type="text" placeholder="Tìm kiếm" name="query" value="<?php echo stripslashes($search) ?>">
        </form>
    </div>
    <div id="user" onclick="location.href='/signing/form_sign_in.php'" style="
    background-image: url('/signing/photos/<?php echo $anh_dai_dien ?>');
    background-size:30px;
    background-position: 15px 20px;
    background-repeat: no-repeat;">
    </div>
    <div id="shopping_cart" onclick="location.href='/cart/view_cart.php'"></div>
    <div id="help" onclick="location.href='https://github.com/caoTayTang/ecommerce-website'"></div>
</div>
<script>

function logo(x) {
    let toggleBar = document.getElementById('menu');
    let menu = document.getElementById('hamburger_container');
    let overlay = document.getElementById('overlay');
    let cancel = document.getElementById('cancel_button')

        toggleBar.style.display = "block";
    menu.style.position = "fixed";
    overlay.style.display = "block";

    // If cancle div or the gray overlay be clicked
    cancel.addEventListener("click",() => {
    toggleBar.style.display = "none";
    menu.style.position = "relative";
    overlay.style.display = "none";
        })

        overlay.addEventListener("click", () => {
        toggleBar.style.display = "none";
        menu.style.position = "relative";
        overlay.style.display = "none";
        });
    }

</script>
