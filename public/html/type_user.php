<style>
          .popup-container2{height: 100%;width: 100%;display: flex;flex-wrap: wrap;justify-content: center;align-items: center;background-color: rgb(256 256 256 / 70%);position: absolute;top: 0;left: 0;}
      .popup2{margin: 20% 35%; background-color: #fff;padding: 20px 30px;width: 95%;border-radius: 15px;}
      .popups2{display: block;cursor: pointer;border: 2px solid transparent;height: 100%;width: 100%;position: fixed;z-index: 200; }
</style>
<div class="popups2">
    <div class="popup-container2">
        <div class="popup2">
            <div class="d-grid gap-2 d-md-block">
                <button class="btn p-3 btn-outline-primary" type="button" onclick="Employer()">Предлогаю работу</button>
                <button class="btn p-3 btn-outline-primary" type="button" onclick="worker()">Ищу работу</button>
            </div>
        </div>
    </div>
</div>
<script>
    function Employer(){
        document.cookie = "type_user=Employer";
        location.reload();
    }
    function worker(){
        document.cookie = "type_user=worker";
        location.reload();
    }
</script>