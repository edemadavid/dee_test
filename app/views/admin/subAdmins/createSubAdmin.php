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

        
            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        
            
        
                <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">


                    <!-- Contact Form -->
                    
                    
                    <div class="mt-0 mx-4">
                        
                        <div class="grid grid-cols-1 md:grid-cols-1">
                            <div class="flex flex-wrap items-center px-4 py-0">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h1 class="font-semibold text-3xl text-gray-900 dark:text-gray-50">Register a new Teacher</h1>
                                </div>
                            </div>

                            <span><?php echo $data['Error']; ?> </span>
                            <form class="p-6 flex flex-col justify-center" action="<?php echo URLROOT; ?>teachercontroller/create" method="POST">
                            
                                <div class="flex flex-col">
                                    <label for="username" class="hidden">Username</label>
                                    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $data['username']; ?>" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                    <span><?php echo $data['usernameError']; ?> </span>
                                </div>
                                
                                
                        
                                <div class="flex flex-col mt-2">
                                    <label for="email" class="hidden">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $data['email']; ?>"class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                    <span><?php echo $data['emailError']; ?> </span> 
                                </div>
                        
                                <div class="flex flex-col mt-2">
                                    <label for="password" class="hidden">Password</label>
                                    <input type="password" name="password" id="password" placeholder="password"
                                    value="<?php echo $data['password']; ?>" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                    <span><?php echo $data['passwordError']; ?> </span>
                                </div>

                                <div class="flex flex-col mt-2">
                                    <label for="password" class="hidden">Password</label>
                                    <input type="password" name="confirmPassword" id="password" placeholder="Repeat Password" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                    <span><?php echo $data['confirmPasswordError']; ?> </span>
                                </div>
                        
                                <button type="submit" name="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">
                                    Register

                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- ./Contact Form -->

                </div>
                    
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


