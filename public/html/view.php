<!DOCTYPE html>
<html lang="ru" class="">
  <head>
    <meta charSet="utf-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $company_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  </head>
  <body>
  <div id="popup" class="popups">
      <div class="popup-container">
          <div class="popup">
              <div class="btn btn-danger float-end" id="closeBtn">
                <a>X</a>
              </div>
              <h5>Оформление заявки</h5>
              <form method="POST"  enctype="multipart/form-data">
                <input type="hidden" name="idvac" id="idvac" value="">
                <div class="mb-3">
                  <label for="comment" class="form-label">Комментарий</label>
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="file" class="form-label">Прикрепить CV</label>
                  <input type="file" class="form-control" id="file" name="file">
                </div>
                

                <a id="closeBtn2" class="btn btn-danger float-start">Отменить</a>
                <button type="submit" name="respond_check" class="btn btn-primary float-end">Откликнуться</button>
              </form>
          </div>
      </div>
    </div>
    
    <?php 
      require_once 'header.php';
    ?>

    <div class="album py-5 bg-light" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $query_site['Title']; ?></h2>
                            <h4 class="card-title">Зарплата:
                            <?php 
                            if ($query_site['MinSalary'] == $query_site['MaxSalary']) { ?>
                                <?php echo $query_site['MinSalary']; 
                            }

                            else if ($query_site['MinSalary'] != 0)  { ?>
                                От: <?php echo $query_site['MinSalary'];  
                            }
                            else if ($query_site['MaxSalary'] != 0)  { ?>
                                До: <?php echo $query_site['MaxSalary']; 
                            }
                            else { ?>
                                Не указана
                            <?php 
                            } 
                            ?>

                        </h4>
                        <span class="fw-lighter"> Дата публикации: <?php echo $query_site['DateOfCreate']; ?> | Просмотрено: <?php echo $query_site['Visits']; ?></span>
                        <hr>
                        <p class="card-text"><?php echo $query_site['Description']; ?></p>
                        <p align="right">
                            <a id = "open_popup-<?php echo $_GET["Id"]; ?>" class="btn btn-primary my-2">Откликнуться</a>
                        </p>

                
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="p-2">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">О компании:</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $query_site['CompanyName']; ?></h4>
                                <p class="card-text"><?php echo $query_site['CompanyDescription']; ?></p>
                            </div>
                            <div class="card-footer bg-white">
                                <h4>Контакты:</h4>
                                <p class="card-text">Email: <?php echo $query_site['email']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h4 class="card-title">Теги:</h4>
                                </div>
                                <?php if ($query_tags->num_rows == 0) { ?>
                                    <div class="card-body">
                                        <p class="card-text">Теги не указаны</p>
                                    </div>
                                <?php } else { ?>
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php 
                                        // var_dump($query_tags);
                                         while($row = mysqli_fetch_assoc($query_tags)) { 
                                            // var_dump($row);
                                            ?>

        <!-- <img src="..." class="" alt="..."> -->
                                        <a class="btn btn-outline-primary rounded-pill"><?php echo $row['Title']; ?></a>
                                        <?php } ?>
                                    </p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>                
                </div>    
            </div>
        </div>
<?php 
    // var_dump($query_site['Title']);
?>

<script>
    document.getElementById("open_popup-<?php echo $_GET["Id"]; ?>").addEventListener('click', ()=>{
    document.getElementById("popup").style.display = 'block'; 
    document.getElementById('idvac').value = '<?php echo $_GET["Id"]; ?>';
    // alert(document.getElementById('idvac').value);
    });
    document.getElementById("closeBtn").addEventListener('click', ()=>{document.getElementById("popup").style.display = 'none';});
    document.getElementById("closeBtn2").addEventListener('click', ()=>{document.getElementById("popup").style.display = 'none';});
    // popup.addEventListener('click', ()=>{popup_<?php echo $_GET["Id"]; ?>.style.display = 'none';});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <style>
    .card-body {
        margin: 2%;
    }
      .container4 {
          height: 10em;
          background: #198754;
          position: relative 
        }
      .container4 i {
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          color:white;
          margin-right: -50%;
          transform: translate(-50%, -50%) 
        }
      .popup-container{height: 100%;width: 100%;display: flex;flex-wrap: wrap;justify-content: center;align-items: center;background-color: rgb(96 95 127 / 70%);position: absolute;top: 0;left: 0;}
      .popup{
        margin: 15%; background-color: #ffffff;padding: 20px 30px;width: 95%;border-radius: 15px;}
      .popups{display: none;cursor: pointer;border: 2px solid transparent;height: 100%;width: 100%;position: fixed;z-index: 100; 
      }
    </style>
  </body>
</html>