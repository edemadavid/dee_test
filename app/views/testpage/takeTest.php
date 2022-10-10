<?php
    require APPROOT.'/views/layout/header.php';
    // require APPROOT.'/views/layout/includes/head.php';

?>


<body class="bg-gray-200">

<style>
#overlay {
  position: fixed;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.8);
  z-index: 2;
  cursor: pointer;
}

</style>
    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

            <!-- Header -->
            
            <?php         
                $profile = $data['profile'];

                $quizes = $data['quizes']
            ?>
            <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                <div class="flex items-center justify-start md:justify-center pl-1 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
                    <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" 
                        src="<?php 
                                if (empty($profile->photo)) 
                                    {echo "https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg";
                                } else { echo FILE_ROOT.$profile->photo; } 
                            ?>" alt="profile pics" />
                    <span class="hidden md:block"> Hi, 
                    <?php echo $_SESSION["name"] ?>
                    </span>
                </div>
                <div class="flex justify-around items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
                    <div class="flex justify-center items-center w-full max-w-xl mr-4 p-2">
                        <p id=title class="">Quiz Page</p> 
                        <p id="countdown" class="text-3xl"></p>
                    </div>
                    <div class="flex items-center max-w-xl mr-4 p-2">
                        <ul class="flex items-center">
                            <li>
                            <button
                                aria-hidden="true"
                                @click="toggleTheme"
                                class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none"
                                >
                                <svg
                                x-show="isDark"
                                width="24"
                                height="24"
                                class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke=""
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                />
                                </svg>
                                <svg
                                x-show="!isDark"
                                width="24"
                                height="24"
                                class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke=""
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                />
                                </svg>
                            </button>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ./Header -->

            <div class="h-full container mx-auto my-10 md:mx-auto justify-center items-center relative">
                <div class="shadow-lg p-4 item-center mt-10 w-full">
                    <div class="text-center">
                        
                        <form class="" action="<?php echo  URLROOT ?>testcontroller/storeResult" method="post">
                                <?php $index = 0 ?>
                                <?php foreach ($quizes as $quiz): ?>
                                <?php $index++ ?>

                            <div class="question" id="question">
                                <?php $subject_id = $quiz->subject_id; ?>
                                <?php $level_id = $quiz->level_id; ?>

                                <div>
                                    <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>">
                                    <input type="hidden" name="level_id" value="<?php echo $level_id ?>">
                                </div>
                                <div class="question text-2xl mt-5 flex justify-between mb-5">
                                    <span class="ml-5">
                                        <?php echo  $index ?>.
                                    </span>
                                    <p><?php echo $quiz->question; ?></p>
                                    <span></span>
                                </div>

                                <div class="flex flex-col mt-5">
                                    <div class="text-left mx-3 mt-5">
                                        <input type="radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                                        name="<?php echo $quiz->id ?>choice" value="a"> 
                                        <span class="ml-5"> 
                                            <?php echo $quiz->opt_A; ?>
                                        </span>
                                    </div>

                                    <div class="text-left mx-3 mt-5">
                                        <input  type="radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "name="<?php echo $quiz->id ?>choice" value="b"> 
                                        <span class="ml-5">
                                            <?php echo $quiz->opt_B; ?>
                                        </span>
                                    </div>

                                    <div class="text-left mx-3 mt-5">
                                        <input type="radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "name="<?php echo $quiz->id ?>choice" value="c"> 
                                        <span class="ml-5">
                                            <?php echo $quiz->opt_C; ?>
                                        </span>
                                    </div>
                                        
                                    <div class="text-left mx-3 mt-5">
                                        <input type="radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "name="<?php echo $quiz->id ?>choice" value="d">
                                        <span class="ml-5">
                                            <?php echo $quiz->opt_D; ?>
                                        </span>
                                    </div>
                                    <div class="text-left mx-3 mt-5">
                                        <input type="radio"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " name="<?php echo $quiz->id ?>choice" value="e" checked>
                                        <span class="ml-5">
                                            None of the Above
                                        </span>
                                    </div>
                                        
                                </div>

                            </div>

                            <?php  endforeach ?>
                        
                            <button id="submit" type="submit" class="my-5 capitalize bg-blue-500 rounded-lg px-5 py-2 text-white ">submit</button>
                        </form>

                    </div>
                </div>          
                
                <!-- Modal -->
                <div id="overlay"></div>
                <div id=modal class="flex z-50 justify-center absolute top-10 overflow-x-hidden left-0 right-0">
                    <div class="px-6 py-4 transition-colors duration-200 transform rounded-lg bg-white  w-[50%]">
                            <p class="text-2xl text-center font-medium text-black uppercase">Instructions</p>
                        
                            <p class="mt-4 text-gray-500 ">The following are instructions that should be placed at the front of your online exam, each distinct for their exam type they will need to be included to ensure consistent instructions for students and to align with university policies around misconduct. </p>

                            <div class="mt-8 space-y-8">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-4 text-gray-700 ">You must only attempt this exam once.</span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-4 text-gray-700 ">The duration of this exam is 5 minutes.</span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0  text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-4 text-gray-700 ">You are not permitted to take screenshots, record the screen.</span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0  text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-4 text-gray-700 ">Misconduct action will be taken against you if you breach university rules.</span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0  text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>

                                    <span class="mx-4 text-gray-700 ">You are not permitted to post any requests for clarification of exam content.</span>
                                </div>
                            </div>

                            <button id="btn" class="w-full px-4 py-2 mt-10 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Start Exams
                            </button>
                    </div>
                    
                </div>
            </div>


        </div>    
    </div>
        

    

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


        // modal
        const button = document.getElementById('btn');
        const modal =  document.getElementById('modal');
        const overlay =  document.getElementById('overlay');
        const submit =  document.getElementById('submit');
        const title =  document.getElementById('title');
        const open = true;
        
        
        const startingMinutes = 1;

        const timedSeconds = startingMinutes * 60 * 1000;

        button.addEventListener('click', ()=>{
            setInterval(updateCountdown, 1000)
            title.style.display = "none";
            setTimeout(myTimer, timedSeconds);
            overlay.style.display = "none";
            modal.style.display = "none";
        })
        const myTimer = () =>{
            submit.click();
        }


        
        // to get the minutes
        let time = startingMinutes * 60;
        const countdownEl = document.getElementById('countdown');

        

        function updateCountdown (){
            const minutes = Math.floor(time/60);
            let seconds = time % 60;
            seconds = seconds < 10 ? '0': seconds;
            countdownEl.innerHTML = `${minutes}:${seconds}`;
            time--;
        }
        

    </script>
  <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</body>





<?php
    require APPROOT.'/views/layout/footer.php';
?>