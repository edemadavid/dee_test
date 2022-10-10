<nav>
      <!-- Sidebar -->
      <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">



            <!-- Main Sub-Heading -->
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
              </div>
            </li>
            <?php 
              if ( ( isloggedin() 
                      && isAdmin()  
                    ) )  :
            ?>

            <!-- Dashboard -->
            <li>
              <a href="<?php echo URLROOT; ?>admincontroller/index" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 
              <?php 
                if ($data['title'] == "Admin Dashboard" ) { 
                    echo 'active';
                    } else { 
                      echo '';
                      } ; 
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">

                  <svg xmlns="http://www.w3.org/2000/svg" id="Outline" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor"><path d="M7,0H4A4,4,0,0,0,0,4V7a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V4A4,4,0,0,0,7,0ZM9,7A2,2,0,0,1,7,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H7A2,2,0,0,1,9,4Z"/><path d="M20,0H17a4,4,0,0,0-4,4V7a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V4a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z"/><path d="M7,13H4a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V17A4,4,0,0,0,7,13Zm2,7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2H7a2,2,0,0,1,2,2Z"/><path d="M20,13H17a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V17A4,4,0,0,0,20,13Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z"/></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <!-- ./Dashboard -->

            <!-- Teachers -->
            <li>
              <a href="<?php echo  URLROOT ?>teachercontroller" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6
              <?php 
                if ($data['title'] == "Teachers" ) { 
                    echo 'active';
                    } else { 
                      echo '';
                      } ; 
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">

                <svg id="Layer_1"  class="w-5 h-5" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5zm7.5 17v-.5a7.5 7.5 0 0 0 -15 0v.5a1 1 0 0 0 2 0v-.5a5.5 5.5 0 0 1 11 0v.5a1 1 0 0 0 2 0zm9-5a7 7 0 0 0 -11.667-5.217 1 1 0 1 0 1.334 1.49 5 5 0 0 1 8.333 3.727 1 1 0 0 0 2 0zm-6.5-9a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm0-7a2.5 2.5 0 1 0 2.5 2.5 2.5 2.5 0 0 0 -2.5-2.5z"/></svg>

                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Teachers</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
              </a>
            </li>
            <!-- ./Teachers -->

            <!-- Students -->
            <li>
              <a href="<?php echo  URLROOT ?>studentcontroller" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6
              <?php 
                if ($data['title'] == "Students" ) { 
                    echo 'active';
                    } else { 
                      echo '';
                      } ; 
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" stroke="currentColor"><path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Zm6,13A6,6,0,0,0,6,23a1,1,0,0,0,2,0,4,4,0,0,1,8,0,1,1,0,0,0,2,0ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,18,2Zm6,13a6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8ZM6,2A2,2,0,1,0,8,4,2,2,0,0,0,6,2ZM2,15a4,4,0,0,1,4-4A1,1,0,0,0,6,9a6.006,6.006,0,0,0-6,6,1,1,0,0,0,2,0Z"/></svg>

                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
              </a>
            </li>
            <!-- ./Students -->

            <!-- Subjects -->
            <li>
              <a href="<?php echo  URLROOT ?>subjectcontroller" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 
              <?php 
                if ($data['title'] == "Subjects") 
                    { echo 'active';} 
                      else { echo '';} ;  
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" ><path d="M23.98,21.566L16.756,1.967c-.276-.752-.828-1.352-1.556-1.688-.727-.338-1.542-.371-2.294-.094l-.939,.345c-.283,.104-.544,.246-.778,.423-.548-.585-1.326-.952-2.189-.952H3C1.346,0,0,1.346,0,3V24H12V9.305l5.408,14.672,6.572-2.41Zm-5.387-.154l-.965-2.619,2.816-1.033,.965,2.619-2.816,1.033Zm-1.657-4.495l-3.489-9.466,2.816-1.034,3.489,9.466-2.816,1.033ZM12.093,2.925c.112-.242,.312-.427,.563-.519l.939-.345c.112-.041,.229-.062,.345-.062,.143,0,.285,.031,.419,.093,.243,.112,.427,.312,.52,.564l.694,1.884-2.816,1.034-.695-1.885c-.092-.251-.081-.522,.031-.765Zm-2.093,.075v2h-3V2h2c.551,0,1,.448,1,1Zm-3,4h3v10h-3V7Zm-2,10H2V7h3v10ZM3,2h2v3H2V3c0-.552,.449-1,1-1Zm-1,17h3v3H2v-3Zm5,3v-3h3v3h-3Z"/></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Subjects</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
              </a>
            </li>
            <!-- ./Subjects -->
            <?php endif ?>

            <?php 
              if ( ( isloggedin() 
                          && isSubAdmin() 
                        ) ) : 
            ?>

            
            <!-- Teachers Dashboard -->
            <li>
              <a href="<?php echo URLROOT; ?>quizcontroller/index" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6 
              <?php 
                if ($data['title'] == "TeacherDashboard" ) { 
                    echo 'active';
                    } else { 
                      echo '';
                      } ; 
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">

                  <svg xmlns="http://www.w3.org/2000/svg" id="Outline" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor"><path d="M7,0H4A4,4,0,0,0,0,4V7a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V4A4,4,0,0,0,7,0ZM9,7A2,2,0,0,1,7,9H4A2,2,0,0,1,2,7V4A2,2,0,0,1,4,2H7A2,2,0,0,1,9,4Z"/><path d="M20,0H17a4,4,0,0,0-4,4V7a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V4A4,4,0,0,0,20,0Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V4a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z"/><path d="M7,13H4a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4H7a4,4,0,0,0,4-4V17A4,4,0,0,0,7,13Zm2,7a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2H7a2,2,0,0,1,2,2Z"/><path d="M20,13H17a4,4,0,0,0-4,4v3a4,4,0,0,0,4,4h3a4,4,0,0,0,4-4V17A4,4,0,0,0,20,13Zm2,7a2,2,0,0,1-2,2H17a2,2,0,0,1-2-2V17a2,2,0,0,1,2-2h3a2,2,0,0,1,2,2Z"/></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <!-- ./Teachers Dashboard -->
            <?php endif ?>

            <?php 
              if ( ( isloggedin() 
                          && isAdmin() 
                          || isSubAdmin() 
                        ) ) : 
            ?>

            <!-- Quizes -->
            <li>
              <a href="<?php echo URLROOT; ?>quizcontroller/create"  class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6
              <?php 
                if ($data['title'] == "quiz" ) { 
                    echo 'active';
                    } else { 
                      echo '';
                      } ; 
              ?> ">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m19.828 3.414-2.242-2.242a4.024 4.024 0 0 0 -2.828-1.172h-8.758a3 3 0 0 0 -3 3v21h18v-17.758a4.024 4.024 0 0 0 -1.172-2.828zm-1.414 1.414a2.113 2.113 0 0 1 .141.172h-2.555v-2.555a2.113 2.113 0 0 1 .172.141zm-13.414 17.172v-19a1 1 0 0 1 1-1h8v5h5v15zm9-5h3v2h-3zm1-2v-1.707a6.964 6.964 0 0 0 -.621-2.883l-.522-1.153a2 2 0 0 0 -3.7-.04l-.539 1.194a6.956 6.956 0 0 0 -.618 2.882v1.707h2v-1h2v1zm-2.982-4.959.539 1.192a4.949 4.949 0 0 1 .252.767h-1.618a4.9 4.9 0 0 1 .252-.766zm-.478 6 1.42 1.408-1.866 1.884a2.255 2.255 0 0 1 -3.185 0l-.873-.891 1.428-1.4.866.884a.249.249 0 0 0 .347-.007z"/></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Quiz</span>
              </a>
            </li>
            <!-- ./Quizes -->

            <!-- Notifications  -->
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
              </a>
            </li>
            <!-- ./Notifications -->


            <!-- Settings Sub-Heading -->
            <li class="px-5 hidden md:block">
              <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
              </div>
            </li>


            <?php endif ?>






            <?php 
              if ( ( isloggedin() 
                          && isStudent() 
                        ) ) : 
            ?>

            <!-- Student Dashboard -->
            <li>
              <a href="<?php echo URLROOT; ?>testcontroller/index" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
              </a>
            </li>
            <!-- ./Student Dashboard -->

           
            <?php endif ?>


            <!-- Profile -->
            <li>
              <a href="<?php echo URLROOT; ?>profilecontroller/index" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
              </a>
            </li>
            <!-- ./Profile -->
            

            <!-- Settings -->
            <li>
              <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
              </a>
            </li>
            <!-- ./Settings -->

            



          </ul>
          <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2021</p>
        </div>
      </div>
      <!-- ./Sidebar -->
</nav>