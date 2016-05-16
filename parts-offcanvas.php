 <?php $theme_option = flagship_sub_get_global_options(); 
        $collection_name = $theme_option['flagship_sub_search_collection'];
    ?>
<div class="off-canvas-bg">
  <div id="pattern" class="pattern">
    <div class="offcanvas-top">
        <div class="o-content" aria-hidden="false" role="navigation">
          <ul class="small-block-grid-4" id="global-links" role="list">
              <li class="black"><h1>Academics</h1>
                  <ul class="no-bullet" role="menu">
                    <li role="menuitem"><a href="http://krieger.jhu.edu/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')";>Departments, Programs, and Centers</a></li>
                    <li role="menuitem"><a href="http://krieger.jhu.edu/about/faculty/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
                    <li role="menuitem"><a href="http://krieger.jhu.edu/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
                    <li role="menuitem"><a href="http://www.library.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Libraries')">Libraries</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">Other Educational Opportunities<span>+</span></a></li>
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://advanced.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'AAP')">Advanced Academic Programs</a></li>
                        <li role="menuitem"><a href="http://web.jhu.edu/study_abroad" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Study Abroad')">Study Abroad</a></li>
                        <li role="menuitem"><a href="http://pages.jh.edu/summer/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Summer')">Summer Programs</a></li>
                      </ul>
                  </ul>
              </li>
              <li class="black"><h1>Student & Faculty Resources</h1>    
                  <ul class="no-bullet" role="menu">
                    <li role="menuitem"><a href="https://isis.jhu.edu/sswf/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'ISIS')">Course Listings & Registration</a></li>
                    <li role="menuitem"><a href="http://finaid.johnshopkins.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Financial Aid')">Financial Aid</a></li>
                    <li role="menuitem"><a href="https://hrnt.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Human Resources')">Human Resources</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">KSAS Policies<span>+</span></a></li>
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://web.jhu.edu/Homewood-IRB" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'IRB')">Institutional Review Board</a></li>
                        <li role="menuitem"><a href="http://krieger.jhu.edu/kasper" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'KASPER')">KASPER</a></li>
                        <li role="menuitem"><a href="http://krieger.jhu.edu/research/policies/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Polices/Procedures')">Policies & Procedures</a></li>
                      </ul>
                    <li role="menuitem"><a href="http://web.jhu.edu/registrar" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">Student Services<span >+</span></a></li>      
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://homewoodgrad.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Grad/Postdoc Affairs')">Graduate and Postdoctoral Affairs</a></li>
                        <li role="menuitem"><a href="http://studentaffairs.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'HSA')">Homewood Student Affairs</a></li>
                      </ul>
                  </ul>
              </li>
              <li class="black"><h1>Across Campus</h1>
                <ul class="no-bullet" role="menu">
                  <li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions</a></li>
                  <li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
                  <li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
                  <li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
                  <li role="menuitem"><a href="http://hub.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'TheHub')">The Hub</a> | <a href="http://hub.jhu.edu/at-work" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'HubAtWork')">at Work</a></li>
                </ul>
            </li>
            <li role="menuitem">
                <a href="http://krieger.jhu.edu/giving/" class="button" onclick="ga('send', 'event', 'Offcanvas', 'ETC', 'Giving')"><span class="fa fa-gift"></span> Give Now!</a>
                <form method="GET" action="<?php echo site_url('/search'); ?>" role="search" id="search-bar">
                      <input type="submit" class="icon-search" value="&#xe004;" />
                      <label for="search" class="screen-reader-text">Search</label>
                      <input type="text" id="search" name="q" placeholder="Search this site" aria-label="search"/>
                      <input type="hidden" name="site" value="<?php echo $collection_name; ?>" />
                </form>
            </li>
          </ul>
          <hr class="hide-for-medium-up">
      </div>
    </div>
  </div>
  <!--End Pattern HTML-->
</div>