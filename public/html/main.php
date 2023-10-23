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
    <?php 
      require_once 'header.php';
    ?>
      
    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-9 col-sm-11">
            <div class="text-center my-5">
              <h1 class="fw-bold mb-2 text-uppercase">Создать</h1>
            </div>
            <div class="card shadow-lg">
              <div class="card-body p-5">
                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                  <div class="mb-3">
                    <label class="mb-2 text-muted" for="link">Ссылка</label>
                    <input id="link" type="text" class="form-control" name="link" value="<?php echo $link; ?>" required autofocus>
                    <div class="invalid-feedback">
                      Link is required	
                    </div>
                  </div>

                  <div class="mb-3">
                    
                    <label class="mb-2 text-muted" for="shorten_link">Сокращение</label>
                    
                    <div class="input-group mb-3">
                      <!-- <span class="input-group-text" id="basic-addon3"></span> -->
                      <input id="shorten_link" type="text" class="form-control" aria-describedby="link_begin"name="shorten_link" value="<?php echo $host.($shorten_link ?? "/"); ?>" required>
                      <span class="input-group-text" id="link_begin" onclick="copy()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/></svg></span>
                    </div>
                    
                    <div class="p-2">
                      <a class="btn btn-secondary ms-auto">
                          Рандом
                      </a>
                    </div>
                    <div class="invalid-feedback">
                      Shorten link is invalid
                    </div>
                  </div>
                  <div class="align-items-center d-flex">
                    <button type="submit" name="create_check" class="btn btn-primary ms-auto">
                      Создать
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
      function copy(){
        var copyText = document.getElementById("shorten_link");

        /* Select the text field */
        copyText.select();

        copyText.value = copyText.value
        /* Copy the text inside the text field */
        document.execCommand("copy");
      }
    </script>
  </body>
</html>