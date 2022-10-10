<?php
    require APPROOT.'/views/layout/header.php';
?>



    <!-- <div>
        <p>Admin's Page</p>


        <?php var_dump($_SESSION)?>


        <br>
        <br>

        <a href="<?php echo  URLROOT ?>usercontroller/logout">logout</a>


        <br>
        <br>
        <br>


        <table>
        <p>List of Super Admin</p>
        <th>
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Date Created</td>
            </tr>
        </th>
        <tbody>
        <?php 
            
            $superAdmins = $data['superAdmin'];

            foreach ($superAdmins as $superAdmin)  : ?>

            <tr>
                <td> <?php echo $superAdmin->users_name ?> </td>
                <td> <?php echo $superAdmin->user_email ?> </td>
                <td> <?php echo date('F j h:i', strtotime($superAdmin->timeCreated) ) ?> </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
        </table>


        <br>
        <br>
        <br>
        <br>


        <table>
        <a href="<?php echo  URLROOT ?>admincontroller/registerAdmin">Add a new Teacher</a> 
        <p>List of Teachers</p>
        <th>
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Date Created</td>
            </tr>
        </th>
        <tbody>
        <?php 
            
            $teachers = $data['teachers'];

            foreach ($teachers as $teacher)  : ?>

            <tr>
                <td> <?php echo $teacher->users_name ?> </td>
                <td> <?php echo $teacher->user_email ?> </td>
                <td> <?php echo date('F j h:i', strtotime($teacher->timeCreated) ) ?> </td>

            </tr>

            <?php endforeach; ?>
        </tbody>
        </table>
            

        <br>
        <br>
        <br>
        <br>


        <table>
        <p>List of Student</p>
        <th>
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Date Created</td>
            </tr>
        </th>
        <tbody>
        <?php 
            
            $students = $data['students'];

            foreach ($students as $student)  : ?>

            <tr>
                <td> <?php echo $student->users_name ?> </td>
                <td> <?php echo $student->user_email ?> </td>
                <td> <?php echo date('F j h:i', strtotime($student->timeCreated) ) ?> </td>

            </tr>

            <?php endforeach; ?>
        </tbody>
        </table>
            






        <table>
        <p>List of Subjects</p>

        <a href="<?php echo  URLROOT ?>admincontroller/createSubject">Create Subject</a> 
        <th>
            <tr>
                <td>s/n</td>
                <td>Subject</td>
                <td>No of Levels</td>
                <td>Date Created</td>
            </tr>
        </th>
        <tbody>
        <?php 
            $x = 1;
            $subjects = $data['subjects'];

            foreach ($subjects as $subject)  : ?>

            <tr>
                <td>
                    <?php ;  
                        echo $x++;
                    ?>
                </td>
                <td> <?php echo $subject->name ?> </td>
                <td> 10 </td>
                <td> <?php echo date('F j h:m', strtotime($subject->timeCreated) ) ?> </td>

            </tr>

            <?php endforeach; ?>
        </tbody>
        </table>
    </div> -->



<body class="bg-gray-200">

    <style>
  
    </style>
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

      <!-- Header -->
      <?php
          require APPROOT.'/views/layout/includes/head.php';
      ?>
      <!-- ./Header -->

      <!-- Nav Bar -->
        <div>
            <?php
                require APPROOT.'/views/layout/includes/navigation.php';
            ?>
        </div>
      <!-- ./Nav Bar -->

    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">

            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
              
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                  <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="text-right">
                  <a href="<?php echo URLROOT . "studentcontroller" ?>">
                    <p class="text-2xl"><?php echo $data['countUsers'] ?></p>
                    <p>Users</p>
                  </a>
                </div>
              
            </div>

          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12 ">
                
                <svg 
                width="30" height="30pt" viewBox="0 0 512.000000 512.000000" 
                >

                  <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" >
                    <path d="M1165 5105 c-328 -72 -545 -401 -481 -730 46 -237 231 -432 466 -491
                    99 -25 273 -15 364 19 250 97 407 320 409 582 1 118 -18 198 -71 300 -48 93
                    -172 218 -262 262 -132 67 -289 88 -425 58z m236 -261 c260 -75 351 -398 169
                    -597 -145 -159 -389 -162 -534 -7 -95 102 -127 230 -87 356 61 197 257 304
                    452 248z"/>
                    <path d="M2133 5105 c-90 -39 -97 -179 -13 -229 26 -15 143 -16 1332 -16 1243
                    0 1305 -1 1337 -18 19 -10 43 -34 53 -53 17 -32 18 -95 18 -1369 0 -1274 -1
                    -1337 -18 -1369 -10 -19 -34 -43 -53 -53 -32 -17 -90 -18 -1227 -18 -1301 0
                    -1228 3 -1267 -57 -42 -63 -16 -149 56 -186 32 -16 106 -17 1249 -15 l1215 3
                    60 24 c83 33 183 133 216 216 l24 60 0 1395 0 1395 -24 60 c-33 83 -133 183
                    -216 216 l-60 24 -1325 2 c-1124 2 -1330 0 -1357 -12z"/>
                    <path d="M2654 4520 c-11 -4 -33 -22 -47 -40 -35 -41 -38 -114 -6 -154 46 -58
                    16 -56 776 -56 657 0 700 1 732 18 37 20 71 73 71 110 0 40 -28 91 -62 112
                    -32 19 -48 20 -738 19 -388 0 -714 -4 -726 -9z"/>
                    <path d="M2638 3924 c-55 -29 -78 -124 -43 -178 40 -61 40 -61 400 -64 379 -4
                    423 -1 465 34 63 53 58 156 -9 201 -34 23 -35 23 -410 23 -313 -1 -381 -3
                    -403 -16z"/>
                    <path d="M3983 3925 c-12 -8 -164 -175 -339 -371 -271 -304 -320 -355 -338
                    -349 -97 30 -142 35 -361 35 l-230 0 -115 116 c-206 207 -328 289 -496 334
                    -97 25 -320 38 -379 21 -27 -7 -82 -46 -165 -116 -151 -128 -186 -148 -260
                    -149 -73 0 -106 19 -260 148 -82 70 -139 110 -165 117 -50 14 -246 5 -330 -15
                    -237 -58 -430 -240 -514 -484 l-26 -77 -3 -619 c-2 -425 1 -635 8 -672 27
                    -131 114 -239 238 -297 56 -26 82 -32 157 -35 62 -3 103 1 133 11 l42 15 0
                    -639 0 -638 -249 -3 c-235 -3 -251 -4 -278 -24 -15 -11 -35 -40 -43 -62 -13
                    -37 -13 -47 0 -84 8 -22 28 -51 43 -62 l28 -21 2015 -3 c2228 -2 2053 -7 2094
                    61 26 41 25 93 0 135 -40 65 16 62 -1135 62 l-1045 0 0 1230 c0 935 3 1230 12
                    1230 6 0 69 -56 139 -125 144 -141 204 -177 324 -195 90 -13 619 -13 710 0
                    142 20 264 109 328 239 30 62 32 72 32 176 0 91 -4 118 -21 156 l-22 46 329
                    368 c341 382 351 396 335 462 -4 14 -22 41 -41 60 -28 28 -40 33 -82 33 -27 0
                    -58 -7 -70 -15z m-3073 -561 c132 -111 222 -159 323 -173 158 -22 274 22 457
                    175 l115 96 95 -6 c205 -12 272 -49 505 -277 99 -97 190 -181 202 -188 15 -7
                    110 -11 290 -11 259 0 270 -1 313 -22 66 -34 93 -79 88 -149 -5 -63 -32 -110
                    -81 -137 -28 -15 -71 -17 -354 -20 -222 -2 -335 0 -365 8 -35 10 -68 36 -179
                    146 -86 84 -152 141 -180 154 -58 26 -168 27 -224 1 -54 -25 -113 -85 -139
                    -140 -21 -46 -21 -47 -24 -1303 l-2 -1258 -160 0 -160 0 0 805 c0 888 2 856
                    -62 895 -42 25 -94 26 -135 0 -66 -40 -63 5 -63 -890 l0 -810 -165 0 -165 0 0
                    1316 c1 1300 0 1316 -19 1348 -49 78 -174 75 -218 -7 -16 -29 -18 -79 -23
                    -542 -5 -471 -6 -513 -23 -538 -61 -93 -200 -90 -271 6 -21 28 -21 38 -24 615
                    -2 394 1 604 8 639 30 143 149 281 285 330 53 19 117 30 185 32 l56 1 114 -96z"/>
                  </g>
                </svg>

            </div>
            <div class="text-right">
            <a href="<?php echo URLROOT . "teachercontroller" ?>">
              <p class="text-2xl"><?php echo $data['countTeachers'] ?></p>
              <p>Teachers</p>
            </a>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div class="text-right">
            <a href="<?php echo URLROOT . "subjectcontroller" ?>">
              <p class="text-2xl"><?php echo $data['countSubjects'] ?></p>
              <p>Subjects</p>
            </a>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-black dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="text-right">
              <p class="text-2xl"><?php echo $data['countQuizes'] ?></p>
              <p>Quizes</p>
            </div>
          </div>
        </div>
        <!-- ./Statistics Cards -->
    
        <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">
    

      </div>
    </div>
  </div>    

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
  </script>
</body>





<?php
    require APPROOT.'/views/layout/footer.php';
?>


