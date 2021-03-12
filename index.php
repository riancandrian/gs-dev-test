<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>GS DevTest</title>
  </head>
  <body>
    <div class="container">
        <h1>
            The story: Geekseat Witch Saga: Return of The Coder!
        </h1>

        <div class="row" style="margin-top: 50px;">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Person A</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="a_aod" placeholder="Age of Death" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" class="form-control" name="a_yod" placeholder="Year of Death" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Person B</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="b_aod" placeholder="Age of Death" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" class="form-control" name="b_yod" placeholder="Year of Death" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-4 offset-md-2">
                            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <?php
            if(ISSET($_POST['submit'])){
                $a_aod = $_POST['a_aod'];
                $a_yod = $_POST['a_yod'];

                $b_aod = $_POST['b_aod'];
                $b_yod = $_POST['b_yod'];
                
                $a_born = $a_yod - $a_aod;
                $b_born = $b_yod - $b_aod;

                if($a_born > $b_born){
                    $number_years = $a_born;
                }else{
                    $number_years = $b_born;
                }

                $sum_of_year = array();
                
                for ($year=1; $year <= $number_years; $year++) {
                
                    /**
                     * Create array for record of kills villagers each years
                     */
                    $data[$year] = array();

                    for ($died_people = 1; $died_people <= $year; $died_people++) { 
    
                        /**
                         * If record for previous years was exist, insert to new array
                         */
                        if(!empty($data[$year - 1])){
    
                            /**
                             * Why do we use it [$died_people - 1] ?
                             * its because index of array start from zero
                             */
                            if(isset($data[$year-1][$died_people - 1])){
                                array_push($data[$year], $data[$year-1][$died_people - 1]);
                            }else{
                                $sum = end($data[$year-1]) + prev($data[$year-1]);
                                array_push($data[$year], $sum);
                            }
                        }else{
                        
                            /**
                             * If not, create new one
                             */
                            array_push($data[$year], $died_people);
                        }
                    }
    
                    $sum_of_year[$year] = 0;
                    foreach ($data[$year] as $key => $value) {
                        $sum_of_year[$year] += $value;
                    }

                }

                if($a_born > 0 && $b_born > 0){
                    echo 'Person A was born on Year = '.$a_yod.' - '.$a_aod.' = '.$a_born.', number of people killed on year '.$a_born.' is '.$sum_of_year[$a_born];
                    echo '<br>';
                    echo 'Person B was born on Year = '.$b_yod.' - '.$b_aod.' = '.$b_born.', number of people killed on year '.$b_born.' is '.$sum_of_year[$b_born];
                    echo '<br>';
                    echo 'So, the average is ('.$sum_of_year[$a_born].' + '.$sum_of_year[$b_born].') / 2 = '.($sum_of_year[$a_born]+$sum_of_year[$b_born])/2;
                }else{
                    echo 'Error : -1'; 
                }
                
            }
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  </body>
</html>