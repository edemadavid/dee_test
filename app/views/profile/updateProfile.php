<?php
    require APPROOT.'/views/layout/header.php';
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

      <?php
        // $profile = $data['profile'];
        $user = $data['user']; 
      ?>
      <div class="h-full w-auto ml-14 mt-14 mb-10 md:ml-64 md:container">

        <div class="p-6">
            <h1 class="font-semibold text-3xl text-gray-900 dark:text-gray-50 ">Update Profile</h1>
        </div>
    
        <form class="p-6 flex flex-col justify-center" action="<?php echo URLROOT; ?>usercontroller/updateProfile"  method="POST" enctype="multipart/form-data">

            <div class="flex flex-col mt-4">
                <label for="username" class="">Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="Full Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" value="<?php if (empty($user->full_name)) 
                                        {echo "";
                                    } else { echo $user->full_name; }?>" />
                <span><?php echo $data['fullnameError']; ?></span>
            </div>



            <div class="flex flex-col mt-4">
                <label for="username" class="">Address</label>
                <input type="text" name="address" id="address" placeholder="Address" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" 
                  value="<?php if (empty($user->address)) 
                                        {echo "";
                                    } else { echo $user->address;} ?>" />
                <span><?php echo $data['addressError']; ?> </span>
            </div>

            <div class="flex flex-col mt-4">
                <label for="username" class="">Phone Number</label>
                <input type="text" name="phoneNo" id="phoneNo" placeholder="Phone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" 
                  value="<?php if (empty($user->tel)) 
                                        {echo "";
                                    } else { echo $user->tel; } ?>" />
                <span><?php echo $data['phoneError']; ?> </span>
            </div>

            <div class="flex mt-4">

              <div>
               
              </div>                  

              <div>
                <label for="username" class="">Profile Picture</label>

                <span><?php //echo $data['test']; ?> </span>
                <img 
                  class="w-64 h-64 rounded"
                  src="<?php 
                            if (empty($user->photo)) 
                              {echo "https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg";
                            } else { echo FILE_ROOT.$user->photo; } ?>" alt="profile pics">

                            
                <input type="file" name="file" id="" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                <span><?php echo $data['imageError']; ?> </span>
              </div>
            </div>

            

            <button type="submit" name="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">
                Update
            </button>
        </form>
    
        
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


