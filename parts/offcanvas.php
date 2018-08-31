 <?php $theme_option = flagship_sub_get_global_options(); 
        $collection_name = $theme_option['flagship_sub_search_collection'];
    ?>
<div class="off-canvas-bg hide-for-print">
  <div id="pattern" class="pattern">
    <div class="offcanvas-top">
        <div class="o-content" aria-hidden="false" role="navigation" aria-label="Global Menu">
          <ul class="small-block-grid-4" id="global-links">
              <li class="black"><h3>Academics</h3>
                  <ul class="no-bullet" role="menu">
                    <li role="menuitem"><a href="https://krieger.jhu.edu/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')";>Departments, Programs, and Centers</a></li>
                    <li role="menuitem"><a href="https://krieger.jhu.edu/people/faculty-directory/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
                    <li role="menuitem"><a href="https://krieger.jhu.edu/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
                    <li role="menuitem"><a href="https://www.library.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Libraries')">Libraries</a></li>
                    <li role="menuitem"><a href="https://krieger.jhu.edu/academics/majors-minors/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Majors & Minors')">Majors & Minors</a></li>
                  </ul>
              </li>
              <li class="black"><h3>Student & Faculty Resources</h3>    
                  <ul class="no-bullet" role="menu">
          					<li role="menuitem"><a href="https://sis.jhu.edu/sswf/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'ISIS')">Course Listings & Registration</a></li>
          					<li role="menuitem"><a href="https://www.jhu.edu/admissions/financial-aid/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Financial Aid')">Financial Aid</a></li>
          					<li role="menuitem"><a href="https://hrnt.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Human Resources')">Human Resources</a></li>
          					<li role="menuitem"><a href="https://studentaffairs.jhu.edu/registrar/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
                  </ul>
              </li>
              <li class="black"><h3>Across Campus</h3>
                <ul class="no-bullet" role="menu">
        					<li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions Information</a></li>
        					<li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
        					<li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
        					<li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
        					<li role="menuitem"><a href="https://hub.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'TheHub')">The Hub</a></li>
                </ul>
            </li>
            <li role="menuitem">
                <a href="https://krieger.jhu.edu/giving/" class="button" onclick="ga('send', 'event', 'Offcanvas', 'ETC', 'Giving')"><span class="fa fa-gift"></span> Give Now!</a>
                <form method="GET" action="<?php echo site_url('/search'); ?>" id="search-bar">
                      <input type="submit" class="icon-search" aria-label="submit" value="&#xe004;" />
                      <label for="search" class="screen-reader-text">Search</label>
                      <input type="text" id="search" name="q" placeholder="Search this site" aria-label="search"/>
                      <input type="hidden" aria-label="site" name="site" value="<?php echo $collection_name; ?>" />
                </form>
            </li>
          </ul>
          <hr class="hide-for-medium-up">
      </div>
    </div>
  </div>
  <!--End Pattern HTML-->
</div>