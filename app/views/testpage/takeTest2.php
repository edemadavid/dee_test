
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo URLROOT ?>public/css/style.css">
        <title>Quiz App</title>
        <style>
            .timer_wrapper {
                text-align: center;
                margin: 0px auto;
                width: max-content
            }

            #timer {
                text-align: center;
                background-color: rgb(51, 124, 167);
                color: #fff;
                padding: 7px 10px;
                font-size: 22px;
                border-radius: 7px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>QUIZ APP</h1>
            <div class="timer_wrapper">
                <div id="timer"></div>
            </div>
            <!-- questions -->
            <div class="questions" id="questions">

            </div>
            <!-- /.questions -->

            <div class="nextprev">
                <div><button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> </div>
                <div><button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
            </div>
            <!-- <div class="submit_wrapper">
                <button type="button" id="submit">Submit</button>
            </div> -->
        </div>

        
        <?php

            $dataQuestions = $data['quiz'];

            foreach ($dataQuestions as $question){
                $quizQuestion[] = [ 
                    'question' => $question->question,
                    'correct' => $question->answer,
                    'answers' => [ 
                        'a'=>$question->opt_A,
                        'b'=>$question->opt_B,
                        'c'=>$question->opt_B,
                        'd'=>$question->opt_D
                    ]
                ];
               
            }

         ?>
         <script> 
            var quizQuestions = <?php echo json_encode( $quizQuestion )?>
        </script>
        <script src="<?php echo URLROOT ?>public/js/index.js"> </script>

    </body>

</html>

