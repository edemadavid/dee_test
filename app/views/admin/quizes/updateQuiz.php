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

        
            <div class="h-full ml-14 mt-14 mb-10 md:ml-64 lg:pr-28">
        
                <!-- Contact Form -->                  
                <div class="mt-4 mx-4 xl:pr-28">

                <?php $quiz = $data['quiz']; ?>
                    
                    <div class="lg:container pr-1">
                        <div class="flex flex-wrap items-center px-4 py-0">
                            <div class="relative w-full max-w-full flex-grow flex-1">
                                
                                <h1 class="font-semibold text-3xl text-gray-900 dark:text-gray-50">Update a New Question</h1>
                            </div>
                        </div>

                        <p class="text-red-500 text-xs italic"> <?php echo $data['test'] ?> </p>
                        <form class="p-6 " action="<?php echo URLROOT."quizcontroller/update/". $quiz->id ?>" method="POST">

                            <div>
                            <?php 
                                $user_id = $data['user_id']; ?>
                                <input type="hidden" name="author" value="<?php echo $user_id ?>" disabled>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                                <div class="flex flex-col mt-4 w-64 mr-2">
                                    <label for="">
                                        Subject   
                                    </label>
                                    <select name="subject" class="w-100 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                    <option  value="0">Please select a subject</option>
                                    <?php 
            
                                        $subjects = $data['subjects'];

                                        foreach ($subjects as $subject)  : ?>

                                            <option
                                                <?php if (($quiz->subject_id) == ($subject->id) ) 
                                                    {
                                                        echo "selected";
                                                    } else {echo "";}
                                                ?>
                                                value="<?php echo $subject->id ?>">
                                                <?php echo $subject->name ?>
                                            </option>
                                        <?php endforeach ?>

                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                    
                                    <p class="text-red-500 text-xs italic"> <?php echo $data['subjectError'] ?> </p>
                                </div>
                                <div class="flex flex-col mt-4 w-64">
                                    <label class="" for="">
                                        Level
                                    </label> 
                                    <select name="level" class="w-100 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                        <option  value="0">Please select a level</option>
                                    <?php 
            
                                        $levels = $data['levels'];

                                        foreach ($levels as $level)  : ?>
                                            <option
                                            <?php if (($quiz->level_id) == ($level->id) ) 
                                                    {
                                                        echo "selected";
                                                    } else {echo "";}
                                                ?>
                                            value="<?php echo $level->id ?>">
                                                <?php echo $level->name ?>
                                            </option>
                                    <?php endforeach ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                    
                                    <p class="text-red-500 text-xs italic"> <?php echo $data['levelError'] ?> </p>
                                </div>
                            </div>
                        
                            <div class="flex flex-col mt-4">
                                <label for="username" class="">Question</label>
                                <textarea name="question" id="" cols="5" rows="3"  placeholder="question" class="w-full lg:w-90 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none"><?php echo $quiz->question; ?></textarea>
                                <p class="text-red-500 text-xs italic"> <?php echo $data['questionError']; ?></p>
                            </div>
                            
                            
                    
                            <div class="flex flex-col mt-10">
                                <label for="optionA" class="">Option A</label>
                                <input type="text" name="optA" id="optA" placeholder="Option A" value="<?php echo $quiz->opt_A ?>"class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                <p class="text-red-500 text-xs italic"> <?php echo $data['optAError'] ?> </p>
                            </div>
                    
                            <div class="flex flex-col mt-2">
                                <label for="optionB" class="">Option B</label>
                                <input type="text" name="optB" id="optB" placeholder="Option B" value="<?php echo $quiz->opt_B?>"class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                <p class="text-red-500 text-xs italic"> <?php echo $data['optBError'] ?> </p>

                            </div>

                            <div class="flex flex-col mt-2">
                                <label for="optionC" class="">Option C</label>
                                <input type="text" name="optC" id="optC" placeholder="Option C" value="<?php echo $quiz->opt_C ?>"class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                <p class="text-red-500 text-xs italic"> <?php echo $data['optCError'] ?> </p>
                                
                            </div>

                            <div class="flex flex-col mt-2">
                                <label for="optionD" class="">Option D</label>
                                <input type="text" name="optD" id="optD" placeholder="Option D" value="<?php echo $quiz->opt_D ?>"class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" />
                                <p class="text-red-500 text-xs italic"> <?php echo $data['optDError'] ?> </p>

                            </div>

                            <div class="flex flex-col mt-10 w-64">
                                <label for="answer" class="">Answer</label>
                                <select name="answer" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                                    <option 
                                        <?php if (empty($quiz->answer)) 
                                                {
                                                    echo "selected";
                                                } else {echo "";}
                                        ?>
                                        value="0">
                                        Please Select an Answer
                                    </option>
                                    <option
                                        <?php if (($quiz->answer) == "a" ) 
                                                {
                                                    echo "selected";
                                                } else {echo "";}
                                        ?>
                                        value="a">
                                        A
                                    </option>
                                    <option 
                                        <?php if (($quiz->answer) == "b" ) 
                                                {
                                                    echo "selected";
                                                } else {echo "";}
                                        ?>
                                        value="b">
                                        B
                                    </option>
                                    <option 
                                        <?php if (($quiz->answer) == "c" ) 
                                                {
                                                    echo "selected";
                                                } else {echo "";}
                                        ?>
                                        value="c">
                                        C
                                    </option>
                                    <option 
                                        <?php if (($quiz->answer) == "d" ) 
                                                {
                                                    echo "selected";
                                                } else {echo "";}
                                        ?>
                                        value="d">
                                        D
                                    </option>

                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                                <p class="text-red-500 text-xs italic"> <?php echo $data['answerError'] ?> </p>

                            </div>


                    
                            <button type="submit" name="submit" class="md:w-100 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">
                                Update Question

                            </button>
                        </form>

                        
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


