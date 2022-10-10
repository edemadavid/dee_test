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
        
            
        
                <div class="grid grid-cols-1 p-4 gap-4">

                  <div class="mt-4 mx-4">
                  <?php $subjects = $data['subjects']; ?>
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h1 class="font-semibold text-3xl text-gray-900 dark:text-gray-50">Update Subject</h1>
                        </div>
                      
                   
                        <div class="mt-6">
                           

                            <form class="p-6 flex flex-col justify-center" action="<?php echo  URLROOT ?>subjectcontroller/update/<?php echo $subjects->id?>"  method="POST">
                            
                                <div class="flex flex-col">
                                    <label for="SubjectTitle" class="hidden">Subject Title</label>
                                    <input type="text" name="subjectTitle" placeholder="Subject Title" value="<?php echo $subjects->name; ?>" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                    <span> <?php //echo $data['subjectTitleError'] ?></span>
                                </div>
                                
                                
                        
                                
                        
                                <button type="submit" name="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">
                                    Update

                                </button>
                            </form>
                        </div>
                  </div>
                

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


