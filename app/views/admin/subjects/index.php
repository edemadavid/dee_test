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
                    <div class="flex flex-wrap items-center px-4 py-2">
                      <div class="relative w-full max-w-full flex-grow flex-1">
                        <h1 class="font-semibold text-3xl text-gray-900 dark:text-gray-50">Subject List</h1>
                      </div>
                      <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                        <!-- <a href="" class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">edit</a> -->
                        <a href="<?php echo  URLROOT ?>subjectcontroller/create" class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add A New Subject</a>
                      </div>
                    </div>


                    <!-- Subject Cards -->
                    <div class="grid sm:grid-cols-1 lg:grid-cols-4 md:grid-cols-2 p-4 gap-4">

                      <?php 
            
                      $subjects = $data['subjects'];

                      foreach ($subjects as $subject)  : ?>
                      <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-around p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                        <div class="">
                          <p></p>
                          <p  class="text-lg">
                            <?php echo $subject->name ?>
                          </p>
                          <div class="flex mt-3">
                            <span class="text-sm">
                              <a href="<?php echo URLROOT . "/subjectcontroller/update/" . $subject->id ?>">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" fill="green" viewBox="0 0 24 24" width="24" height="24"><path d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"/><path d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"/></svg>
                              </a>
                            </span>
                            <span class="mx-3">
                              <form 
                                action="<?php echo URLROOT . "/subjectcontroller/delete/" . $subject->id ?>" 
                                method="post">
                                <button type="submit">
                                  <svg xmlns="http://www.w3.org/2000/svg" id="Outline" fill="red" viewBox="0 0 24 24" width="24" height="24"><path d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z"/><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z"/><path d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/>
                                  </svg>
                                </button>
                              </form>
                            </span>
                          </div>
                        </div>
                        
                        <div class="">
                          <p class="text-sm">Quizes</p>
                          <p>
                            <?php 
                              echo $data['count'][$subject->id];
                            ?>
                          </p>
                          
                        </div>
                      </div>
                      <?php endforeach ?>
                      

                      
                    
                    </div>
                    <!-- ./Subject Cards -->


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


