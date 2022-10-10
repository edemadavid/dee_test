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

              <!-- Teachers Table -->
              <div class="mt-4 mx-4">


                <?php  
                $quizes = $data['quizes'];
                
                //var_dump($quizes);?>



                <!-- Subject Cards -->
                <div class="grid sm:grid-cols-1 lg:grid-cols-3 md:grid-cols-2 xl:grid-cols-4 p-4 gap-4">

                  <?php 

                  $subjects = $data['subjects'];

                  foreach ($subjects as $subject)  : ?>
                  <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-around p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                    <div class="">
                      <p></p>
                      <p  class="text-lg">
                        <?php echo $subject->name ?>
                      </p>
                      
                    </div>
                    
                    <div class="">
                      <p class="text-sm">Question</p>
                      <p>
                        <?php 
                          echo $data['count'][$subject->id];
                        ?>
                      </p>
                    </div>

                    <div>
                      <a class="flex ml-5" href="<?php echo URLROOT . "quizcontroller/show/" . $subject->id ?>">   
                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20"><path d="M23.271,9.419C21.72,6.893,18.192,2.655,12,2.655S2.28,6.893.729,9.419a4.908,4.908,0,0,0,0,5.162C2.28,17.107,5.808,21.345,12,21.345s9.72-4.238,11.271-6.764A4.908,4.908,0,0,0,23.271,9.419Zm-1.705,4.115C20.234,15.7,17.219,19.345,12,19.345S3.766,15.7,2.434,13.534a2.918,2.918,0,0,1,0-3.068C3.766,8.3,6.781,4.655,12,4.655s8.234,3.641,9.566,5.811A2.918,2.918,0,0,1,21.566,13.534Z"/><path d="M12,7a5,5,0,1,0,5,5A5.006,5.006,0,0,0,12,7Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,12,15Z"/></svg>
                      </a>

                    </div>
                    

                  </div>
                  <?php endforeach ?>

                </div>
                <!-- ./Subject Cards -->

              </div>
              <!-- ./Teachers Table -->
        

                
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


