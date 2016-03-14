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
                    <li role="menuitem"><a href="http://krieger.jhu.edu/academics/departments-programs-centers/">Departments, Programs, and Centers</a></li>
                    <li role="menuitem"><a href="http://krieger.jhu.edu/about/faculty/">Faculty Directory</a></li>
                    <li role="menuitem"><a href="http://krieger.jhu.edu/academics/fields/">Fields of Study</a></li>
                    <li role="menuitem"><a href="http://www.library.jhu.edu/">Libraries</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">Other Educational Opportunities<span>+</span></a></li>
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://advanced.jhu.edu/">Advanced Academic Programs</a></li>
                        <li role="menuitem"><a href="http://web.jhu.edu/study_abroad">Study Abroad</a></li>
                        <li role="menuitem"><a href="http://pages.jh.edu/summer/">Summer Programs</a></li>
                      </ul>
                  </ul>
              </li>
              <li class="black"><h1>Student & Faculty Resources</h1>    
                  <ul class="no-bullet" role="menu">
                    <li role="menuitem"><a href="https://isis.jhu.edu/sswf/">Course Listings & Registration</a></li>
                    <li role="menuitem"><a href="http://finaid.johnshopkins.edu/">Financial Aid</a></li>
                    <li role="menuitem"><a href="https://hrnt.jhu.edu/">Human Resources</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">KSAS Policies<span>+</span></a></li>
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://web.jhu.edu/Homewood-IRB">Institutional Review Board</a></li>
                        <li role="menuitem"><a href="http://krieger.jhu.edu/kasper">KASPER</a></li>
                        <li role="menuitem"><a href="http://krieger.jhu.edu/research/policies/">Policies & Procedures</a></li>
                      </ul>
                    <li role="menuitem"><a href="http://web.jhu.edu/registrar">Registrar's Office</a></li>
                    <li role="menuitem"><a href="#" class="off-canvas-submenu-call">Student Services<span >+</span></a></li>      
                      <ul class="no-bullet off-canvas-submenu"> 
                        <li role="menuitem"><a href="http://homewoodgrad.jhu.edu/">Graduate and Postdoctoral Affairs</a></li>
                        <li role="menuitem"><a href="http://studentaffairs.jhu.edu/">Homewood Student Affairs</a></li>
                      </ul>
                  </ul>
              </li>
              <li class="black"><h1>Across Campus</h1>
                <ul class="no-bullet" role="menu">
                  <li role="menuitem"><a href="https://www.jhu.edu/admissions/">Admissions</a></li>
                  <li role="menuitem"><a href="https://www.jhu.edu/">Johns Hopkins University Website</a></li>
                  <li role="menuitem"><a href="https://www.jhu.edu/maps-directions/">Maps & Directions</a></li>
                  <li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub">myJHU</a></li>
                  <li role="menuitem"><a href="http://hub.jhu.edu/">The Hub</a> | <a href="http://hub.jhu.edu/at-work">at Work</a></li>
                </ul>
            </li>
            <li role="menuitem">
                <a href="http://krieger.jhu.edu/giving/" class="button"><span class="fa fa-gift"></span> Give Now!</a>
                <form method="GET" action="<?php echo site_url('/search'); ?>" role="search" id="search-bar">
                      <input type="submit" class="icon-search" value="&#xe004;" />
                      <label for="search" class="screen-reader-text">Search</label>
                      <input type="text" id="search" name="q" placeholder="Search this site" aria-label="search"/>
                </form>
            </li>
          </ul>
          <hr class="hide-for-medium-up">
      </div>
    </div>
  </div>
  <!--End Pattern HTML-->
</div>