<?php
  require APPROOT.'/views/layout/header.php';
 
?>


<?php         
  //Variables Avaliable on this view
  $user = $data['user'];

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

    
      <div class="h-full w-auto ml-14 mt-14 mb-10 md:ml-64 container">
        
               <!-- Contact Form -->
               <div class="mt-8 mx-4">
            
                <div class="container">
                    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                        <div class="relative w-full max-w-full flex-grow flex-1 items-top text-right">
                          <a href="<?php echo  URLROOT ?>usercontroller/updateProfile"
                            class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Edit Profile
                          </a>
                        </div>
                        <div class="flex items-center justify-left mr-4">
                            
                            <div>
                                <img class="w-48 h-48 md:w-48 md:h-48 mr-2 rounded-md overflow-hidden" 
                                  
                                src="<?php 
                                        if (empty ($user->photo)){
                                          echo "https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg";
                                        } else {echo FILE_ROOT.$user->photo ;} 
                                      ?>" />

                                <P class="flex justify-center"> <?php echo $user->users_name?></P>

                                
                            </div>
                            <div class="mt-2 pl-8 ml-4 ">
                                <p class="text-normal text-lg sm:text-2xl font-medium text-gray-600 dark:text-gray-400 ">Full Name: 
                                </p>
                                <p class="text-normal text-base sm:text-2xl font-medium text-gray-500 dark:text-gray-200 pt-2 ">
                                    <?php 
                                      if (empty($user->full_name)) 
                                        {echo "Not Updated";
                                    } else { 
                                      echo $user->full_name;} 
                                    ?>
                                </p>

                                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>

                                    <div class="ml-4 text-md tracking-wide font-semibold w-40"><?php echo $user->user_email; ?></div>
                                </div>

                                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div class="ml-4 text-md tracking-wide font-semibold w-40"><?php if (empty($user->address)) 
                                        {echo "Not Updated";
                                    } else { echo $user->address; }?></div>
                                </div>

                                <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <div class="ml-4 text-md tracking-wide font-semibold w-40"><?php if (empty($user->tel)) 
                                        {echo "Not Updated";
                                    } else {echo $user->tel;}?></div>
                                </div>

                                
                            </div>

                            
                            
                        </div>
                        
        
                        
            
                        
                       
                        
            
                        
                    </div>
        
                    
                </div>
            </div>
          <!-- ./Contact Form -->
          
    
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


