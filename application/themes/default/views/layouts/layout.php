<!DOCTYPE html>
<html>
  <head>
    <title><?= $this->config->item('website_name'); ?> - <?= $pagetitle ?></title>
    <?= $template['metadata']; ?>
	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, maximum-scale=1" />
    <link rel="icon" type="image/x-icon" href="<?= $template['location'].'assets/images/favicon.ico'; ?>" />
    <link rel="stylesheet" href="<?= $template['assets'].'core/uikit/css/uikit.min.css'; ?>" />
	<link rel="stylesheet" href="<?= $template['location'].'assets/css/style.css'; ?>" />
    <link rel="stylesheet" href="<?= $template['location'].'assets/css/main.css'; ?>" />
    <script src="<?= $template['assets'].'core/uikit/js/uikit.min.js'; ?>"></script>
    <script src="<?= $template['assets'].'core/uikit/js/uikit-icons.min.js'; ?>"></script>
	<style type="text/css">* {cursor: url(https://cur.cursors-4u.net/games/gam-4/gam376.cur), auto !important;}</style><a href="https://www.cursors-4u.com/cursor/2008/12/22/world-of-warcraft-wow-short-sword.html" target="_blank" title="World Of Warcraft, WoW Short Sword"><img src="https://cur.cursors-4u.net/cursor.png" border="0" alt="World Of Warcraft, WoW Short Sword" style="position:absolute; top: 0px; right: 0px;" /></a>
  </head>
  <body>
  <div class="wrapper">
  
  
         <header>
		 
		 <nav class="clear">
               <div class="container clear">
                  <div class="m-left">
				  <nav class="uk-navbar" uk-navbar="mode: click">
          <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
			
              <?php foreach ($this->wowgeneral->getMenu()->result() as $menulist): ?>
              <?php if($menulist->main == '2'): ?>
              <li class="uk-visible@m">
                <a href="#" style="font-family:marcellus;font-size:18px">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>&nbsp;<i class="fas fa-caret-down"></i>
                </a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav" style="text-align:center">
                    <?php foreach ($this->wowgeneral->getMenuChild($menulist->id)->result() as $menuchildlist): ?>
                      <li>
                        <?php if($menuchildlist->type == '1'): ?>
                        <a href="<?= base_url($menuchildlist->url); ?>" style="font-family:marcellus;font-size:14px">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>
                        <?php elseif($menuchildlist->type == '2'): ?>
                        <a target="_blank" href="<?= $menuchildlist->url ?>"  style="font-family:marcellus;font-size:14px">
                          <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                        </a>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </li>
			  
              <?php elseif($menulist->main == '1' && $menulist->child == '0'): ?>
			 
              <li class="uk-visible@m">
                <?php if($menulist->type == '1'): ?>
                <a href="<?= base_url($menulist->url); ?>" style="font-family:marcellus;font-size:18px">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
				
                <?php elseif($menulist->type == '2'): ?>
                <a target="_blank" href="<?= $menulist->url ?>" style="font-family:marcellus;font-size:18px">
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
                <?php endif; ?>
              </li>
			  
              <?php endif; ?>
              <?php endforeach; ?>

            </ul>
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#mobile" uk-toggle></a>
          </div>
          
		  
        </nav>
		
		</div>
		</div>
            </nav>
		<div id="mobile" data-uk-offcanvas="flip: true">
          <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-panel">
              <p class="uk-logo uk-text-center uk-margin-small"><?= $this->config->item('website_name'); ?></p>
              <?php if ($this->wowauth->isLogged()): ?>
              <div class="uk-padding-small uk-padding-remove-vertical uk-margin-small uk-text-center">
                <?php if($this->wowgeneral->getUserInfoGeneral($this->session->userdata('wow_sess_id'))->num_rows()): ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->wowauth->getNameAvatar($this->wowauth->getImageProfile($this->session->userdata('wow_sess_id')))); ?>" width="36" height="36" alt="Avatar">
                <?php else: ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="36" height="36" alt="Avatar">
                <?php endif; ?>
                <span class="uk-label"><?= $this->session->userdata('blizz_sess_username'); ?></span>
              </div>
              <?php endif; ?>
              <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                <?php if (!$this->wowauth->isLogged()): ?>
                <?php if($this->wowmodule->getRegisterStatus() == '1'): ?>
                <li><a href="<?= base_url('register'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_register'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowmodule->getLoginStatus() == '1'): ?>
                <li><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->wowauth->isLogged()): ?>
                <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                <li><a href="<?= base_url('panel'); ?>"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                <li><a href="<?= base_url('mod'); ?>"><i class="fas fa-gavel"></i>s <?= $this->lang->line('button_mod_panel'); ?></a></li>
                <?php endif; ?>
                <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                <li><a href="<?= base_url('admin'); ?>"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                <?php endif; ?>
                <?php endif; ?>
                <li><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                <?php endif; ?>
                <?php foreach ($this->wowgeneral->getMenu()->result() as $menulist): ?>
                <?php if($menulist->main == '2'): ?>
                <li class="uk-parent">
                  <a href="#">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <ul class="uk-nav-sub">
                    <?php foreach ($this->wowgeneral->getMenuChild($menulist->id)->result() as $menuchildlist): ?>
                    <li>
                      <?php if($menuchildlist->type == '1'): ?>
                      <a href="<?= base_url($menuchildlist->url); ?>">
                        <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                      </a>
                      <?php elseif($menuchildlist->type == '2'): ?>
                      <a target="_blank" href="<?= $menuchildlist->url ?>">
                        <i class="<?= $menuchildlist->icon ?>"></i>&nbsp;<?= $menuchildlist->name ?>
                      </a>
                      <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <?php elseif($menulist->main == '1' && $menulist->child == '0'): ?>
                <li>
                  <?php if($menulist->type == '1'): ?>
                  <a href="<?= base_url($menulist->url); ?>">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <?php elseif($menulist->type == '2'): ?>
                  <a target="_blank" href="<?= $menulist->url ?>">
                    <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                  </a>
                  <?php endif; ?>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
		<div class="container">
               <div class="about">
			   <a class="logo"></a>
                  <h1 style="font-family:marcellus;top:-100px">Shadowlands <br>9.1.5 Private Server</h1>
                  <a href="#" class="btn big" style="color:black">PLAY NOW</a>
               </div>
               <div class="top-block clear">
                  <div class="countdown-block">
                     <a href="#">
                        <h3>Untill &nbsp; Launch</h3>
                     </a>
                     <div id="clockdiv">
                        <div>
                           <span class="days"></span>
                           <div class="smalltext">Days</div>
                        </div>
                        <div>
                           <span class="hours"></span>
                           <div class="smalltext">Hours</div>
                        </div>
                        <div>
                           <span class="minutes"></span>
                           <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                           <span class="seconds"></span>
                           <div class="smalltext">Seconds</div>
                        </div>
                     </div>
                     <a href="#" class="btn" style="color:black">Read more</a>
                  </div>
                  <div class="forum-block">
                    
          <div class="uk-navbar-right">
             <?php if (!$this->wowauth->isLogged()): ?>
							 <?php if($this->wowmodule->getLoginStatus() == '1'): ?>
								<form action="<?= base_url('en/login'); ?>" method="post" accept-charset="utf-8"><div style="display:none">
<input type="hidden" name="csrf_token_name" value="731295226e629b081b9a7c53052e4dd5" />
</div>
	<div id="sidebox_login" style="text-align: center;">
		<input type="text" name="username" id="login_username" autocomplete="username" value="" placeholder="Username">
		<input type="password" name="password" id="login_password" autocomplete="current-password" value="" placeholder="Password">
		<input type="submit" id="button_login" value="Login">
		<br><br> <a href="<?= base_url('en/register'); ?>">Register an Account</a>
	</div>
</form>
<?php endif; ?>
<?php endif; ?>

				  <center>
                    <?php if ($this->wowauth->isLogged()): ?>
                    <?php if($this->wowmodule->getUCPStatus() == '1'): ?>
                    <a href="<?= base_url('panel'); ?>" style="height:55px;font-family:marcellus;color:orange"><i class="far fa-user-circle" ></i> <?= $this->lang->line('button_user_panel'); ?></a>
                    <?php endif; ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('mod_access_level')): ?>
                    <a href="<?= base_url('mod'); ?>" style="height:55px;font-family:marcellus;color:orange"><i class="fas fa-gavel"></i> <?= $this->lang->line('button_mod_panel'); ?></a>
                    <?php endif; ?>
                    <?php if($this->wowmodule->getACPStatus() == '1'): ?>
                    <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) >= config_item('admin_access_level')): ?>
                    <a href="<?= base_url('admin'); ?>" style="height:55px;font-family:marcellus;color:orange"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a>
                    <?php endif; ?>
                    <?php endif; ?>
                    <a href="<?= base_url('logout'); ?>" style="height:55px;font-family:marcellus;color:orange"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a>
                    <?php endif; ?>
					<div class="uk-navbar-right">
            <?php if ($this->wowauth->isLogged()): ?>
            <div class="uk-navbar-item">
              <ul class="uk-subnav uk-subnav-divider subnav-points">
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_dp'); ?>;pos: bottom"><i class="dp-icon"></i></span><font color="lime"> <?= $this->wowgeneral->getCharDPTotal($this->session->userdata('wow_sess_id')); ?></font></li>
                <li><span uk-tooltip="title:<?=$this->lang->line('panel_vp'); ?>;pos: bottom"><i class="vp-icon"></i></span><font color="lime"> <?= $this->wowgeneral->getCharVPTotal($this->session->userdata('wow_sess_id')); ?></font></li>
              </ul>
            </div>
			<a href="<?= base_url('cart'); ?>" style="height:40px"><i class="fas fa-shopping-cart" style="height:40px"></i></a>
                 
                
            <?php endif; ?>
          </div>
          </div></center>
                  </div>
               </div>
            </div>
         </header>
		 <div class="seperator"></div>
		  <main>
           
         
    
   
<br></br><br></br>
    <?= $template['body']; ?>
	<br></br>
 <div class="seperator"></div>
	<div class="container clear">
	
               <div class="c-block clear"><br></br>
                  <div class="block-big">
                     <h2 style="font-family:marcellus">Become a part of<br>the new world</h2>
                     <p style="font-family:marcellus">Together with ServerName</p>
                     <a href="#" class="btn trans" style="font-family:marcellus">Play now</a>
                     <a href="#" class="btn trans" style="font-family:marcellus">FEATURES</a>
                  </div>
               </div>
            </div>
</main>
<footer>
            <div class="container clear">
               <div class="copy">
                   <p>Copyright <i class="far fa-copyright"></i> <?= date('Y'); ?> <?= $this->config->item('website_name'); ?>. <?= $this->lang->line('footer_rights'); ?></p>
       
      
               </div>
               <div class="menu clear">
                  <div class="m-left">
                     <a href="<?= base_url('en'); ?>">Home</a>
                     <a href="<?= base_url('en/register'); ?>">Register</a>
                    
                  </div>
                  <div class="m-right">
                     <a href="<?= base_url('en/forum'); ?>">Forum</a>
                     <a href="<?= base_url('en/store'); ?>">Store</a>
                  
                  </div>
               </div>
               <div class="social">
                  <p>
                    <a target="_blank" href="<?= $this->config->item('social_facebook'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_twitter'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_youtube'); ?>" class="uk-icon-button"><i class="fab fa-youtube"></i></a>
       
                  </p>
                  <a href="https://opengamescommunity.com" target="_blank" title="Modified by Alex" class="copy-r">Modified by Alex</a>
               </div>
            </div>
         </footer>
     
		
		
		</div>
		<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>

  new Crate({

    server: '839220655321120808',

    channel: '839220655321120810',

  })

</script>
	<style>
	.back-to-top {
  position: fixed;
  right: 5rem;
  bottom: 1.1rem;
  padding: 0.5rem;
  background:transparent;
  border: none;
  cursor: pointer;
  opacity: 100%;
  transition: opacity 0.5s;
}

.back-to-top:hover {
  opacity: 60%;
}

.hidden {
  opacity: 0%;
}

.back-to-top-icon {
  width: 1rem;
  height: 1rem;
  color: #7ac9f9;
}

.progress-bar {
  height: 0.3rem;
  background: orange;
  position: fixed;
  top: 0;
  left: 0;
}
</style>
<div class="progress-bar" />
<button class="back-to-top hidden">
  <img src="<?= $template['location'].'assets/images/upper.png'; ?>" style="width:50px"></img>
</button>
<div class="progress-bar" />

<script>
const showOnPx = 100;
const backToTopButton = document.querySelector(".back-to-top");
const pageProgressBar = document.querySelector(".progress-bar");

const scrollContainer = () => {
  return document.documentElement || document.body;
};

const goToTop = () => {
  document.body.scrollIntoView({
    behavior: "smooth"
  });
};

document.addEventListener("scroll", () => {
  console.log("Scroll Height: ", scrollContainer().scrollHeight);
  console.log("Client Height: ", scrollContainer().clientHeight);

  const scrolledPercentage =
    (scrollContainer().scrollTop /
      (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
    100;

  pageProgressBar.style.width = `${scrolledPercentage}%`;

  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden");
  } else {
    backToTopButton.classList.add("hidden");
  }
});

backToTopButton.addEventListener("click", goToTop);
</script>
	<script src="<?= $template['assets'].'core/js/countdown.js'; ?>"></script>
     <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  </body>
</html>
