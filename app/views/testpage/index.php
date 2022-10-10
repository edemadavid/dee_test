<?php
    require APPROOT.'/views/layout/header.php';
?>


<body class="bg-gray-200">
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
    
        <!-- Subject Cards -->
        <div class="grid sm:grid-cols-1 lg:grid-cols-4 md:grid-cols-2 p-4 gap-4">

          <?php 

          $subjects = $data['subjects'];

          foreach ($subjects as $subject)  : ?>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600  text-white font-medium group">
            <div class="">
              
              <p  class="text-lg">
                <?php echo $subject->name ?>
              </p>

              <div class="mt-4" >
                <p class="tracking-widest" href="#">Take Test</p>
                <ul class="flex gap-x-5 my-5">
                  <?php 
                    $levels = $data['level'];
                      foreach ($levels as $level):
                  ?>
                    <li id="myBtn"><a class="px-2 py-1 bg-black rounded-lg hover:bg-white hover:text-black duration-500" href="<?php echo  URLROOT.'testcontroller/test/'.$subject->id.'/'.$level->id ?>"><?php echo $level->name ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            
            <div class="">
              <p class="text-sm">Score</p>
              <p>
                <?php 
                  //echo $data['count'][$subject->id];
                ?>
              </p>
              
            </div>
          </div>
          <?php endforeach ?>



        </div>
        <!-- ./Subject Cards -->

        <div class="px-3 overflow-x-auto">

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
              <?php //var_dump($scoreData)?>
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


