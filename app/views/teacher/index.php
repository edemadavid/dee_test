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
    
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
          
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


