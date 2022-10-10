<?php
    require APPROOT.'/views/layout/header.php';
?>
<?php 
  $students = $data['students']; 

  $studentProfile = $data['studentProfile'];
  
  ?>

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

        <!-- Contact Form -->
        <div class="mt-8 mx-4">
            
          <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-center">
                    <img class="w-48 h-48 md:w-48 md:h-48 mr-2 rounded-md overflow-hidden" 
                    src="<?php 
                          if (empty ($studentProfile->photo)){
                            echo "https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg";
                          } else {echo FILE_ROOT.$studentProfile->photo ;} 
                        ?>" />
                </div>
              <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 mt-2">
                Full Name: <br> 
                <?php 
                  if (empty ($studentProfile->full_name)){
                    echo "Not Updated yet";
                  } else {echo $studentProfile->full_name;} 
                ?> 
              </p>

              
    
              <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">
                  <?php 
                    if (empty ($studentProfile->address)){
                      echo "No Address";
                    } else {echo $studentProfile->address;} 
                  ?>
                </div>
              </div>
    
              <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">
                <?php 
                    if (empty ($studentProfile->tel)){
                      echo "No Phone Number";
                    } else {echo $studentProfile->tel;} 
                  ?>
                </div>
              </div>
    
              <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div class="ml-4 text-md tracking-wide font-semibold w-40">
                <?php 
                  if (empty ($students->user_email)){
                    echo "Not Updated yet";
                  } else {echo $students->user_email;} 
                ?> 
                </div>
              </div>
            </div>

            <div class="p-6">
              <?php 
                $index = 1;

                $scoreTable = $data['scoreTable'];
                $eachSubject = $data['eachSubject'];
                $levelName = $data['levelName']
              ?>
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">S/n</th>
                    <th class="px-4 py-3">Subject</th>
                    <th class="px-4 py-3">Level</th>
                    <th class="px-4 py-3">Score</th>
                    <th class="px-4 py-3">Percentage</th>
                    <th class="px-4 py-3">Time</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                <?php 
                  foreach ($scoreTable as $scoreData)  : ?>
                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <p> <?php echo $index++ ?></p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php 
                          echo $eachSubject[$scoreData->subject_id] 
                        ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        <?php 
                          echo $levelName[$scoreData->level_id] 
                        ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo $scoreData->score ?>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?php echo ( ($scoreData->score/$scoreData->questionCount) * 100); ?> %
                      </td>
                      <td>
                        <?php echo date('F j h:i', strtotime($scoreData->timeCreated) ) ?>
                      </td>
                      
                    </tr>
                  <?php endforeach; ?>

                    
                </tbody>
              </table>
            
            </div>
          </div>
        </div>
        <!-- ./Contact Form -->
        

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