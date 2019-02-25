<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="uk-width-expand@m">   <!-- inizio colonna (prende il posto che rimane della "riga")  -->
<?php echo_breadcrumbs($breadcrumbs)?>
<div class="uk-section uk-section-muted uk-padding-small"> <!-- sezione -->
<div class="uk-container uk-container-expand uk-padding-remove"> <!-- container (padding) -->

            <h3 class="uk-text-center uk-heading-line"> <!-- titolo pagina -->
                <span>Associati</span>
            </h3>

<?php echo form_open_multipart ('Anagrafica/create_associato','class="uk-form-horizontal"');?>
    
    <fieldset class="uk-fieldset"> <!-- si occupa del padding nel form necessario per il form "orizzontali" -->

    <label class="uk-form-label">Immagine</label>
    <div class="uk-form-controls uk-margin">  
        <div class="js-upload" uk-form-custom="target: #filename"> <!-- target: #id recupera nome del file caricato e lo aggiunge ad id-->
        <img id="preview" class="uk-border-circle" width="150" height="150" src="<?php echo base_url('assets/img/associati/default/avatar.png');?>">
          <input id="file" type="file" name="avatar" onchange="previewFile()" accept="image/*">
          <input id="filename" class="uk-input uk-form-width-medium" type="text" placeholder="Scegli file <?php echo set_value('avatar'); ?>">
          <?php echo form_error('avatar'); ?>
        </div>
    </div>
    
      <label class="uk-form-label">Nome</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="name" placeholder="Mario" pattern="[A-Za-z]+" value="<?php echo set_value('name'); ?>" required>
      <?php echo form_error('name'); ?>
    </div>
  
      <label class="uk-form-label">Cognome</label>
    <div class="uk-form-controls">
        <input class="uk-input uk-form-width-medium" class="uk-input" type="text" name="surname" pattern="[A-Za-z]+" value="<?php echo set_value('surname'); ?>" placeholder="Last Name">
        <?php echo form_error('surname'); ?>
    </div>
  
    <label class="uk-form-label">Data di nascita</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="date" name="datebirth" value="<?php echo set_value('datebirth'); ?>" placeholder="01/07/1975">
      <?php echo form_error('datebirth'); ?>
    </div>

      <label class="uk-form-label">Codice fiscale</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="fiscal_code" pattern="[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]" value="<?php echo set_value('fiscal_code'); ?>" placeholder="RSSMRA75L01H501A">
      <?php echo form_error('fiscal_code'); ?>
    </div>
  
    <label class="uk-form-label">Regione di residenza</label>
    <div class="uk-form-controls">
      <select class="uk-select uk-form-width-medium" id="select_regioni" required>
      </select>
    </div>

    <label class="uk-form-label">Provincia di residenza</label>
    <div class="uk-form-controls">
      <select class="uk-select uk-form-width-medium" id="select_province" required disabled>
      </select>
    </div>

    <label class="uk-form-label">Comune di residenza</label>
    <div class="uk-form-controls">
      <select class="uk-select uk-form-width-medium" id="select_comuni" name="fk_comune" value="<?php echo set_value('fk_comune'); ?>" required disabled>
      </select>
      <?php echo form_error('fk_comune'); ?>
    </div>

      <label class="uk-form-label">Indirizzo di residenza</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="address" value="<?php echo set_value('address'); ?>" placeholder="Via Alle spezie, 8">
      <?php echo form_error('address'); ?>
    </div>
  
      <label class="uk-form-label">Telefono</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="0123987654">
      <?php echo form_error('phone'); ?>
    </div>
  
      <label class="uk-form-label">Telefono secondario</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="phone_ext" value="<?php echo set_value('phone_ext'); ?>" placeholder="3219876543">
      <?php echo form_error('phone_ext'); ?>
    </div>
  
      <label class="uk-form-label">Indirizzo e-mail</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="mario.rossi@gmail.com">
      <?php echo form_error('email'); ?>
    </div>
  
      <label class="uk-form-label">Numero tessera</label>
    <div class="uk-form-controls">
      <input class="uk-input uk-form-width-medium" type="text" name="n_card" value="<?php echo set_value('n_card'); ?>" placeholder="formato libero" required>
      <?php echo form_error('n_card'); ?>
    </div>

      <label class="uk-form-label">Consenso privacy</label>
    <div class="uk-form-controls">
      <input class="uk-checkbox" name="privacy" type="hidden" value="0">
      <input class="uk-checkbox" name="privacy" type="checkbox" value="1">
    </div>
  <br>
      <label class="uk-form-label">Associato attivo</label>
    <div class="uk-form-controls">
      <input class="uk-checkbox" name="active" type="hidden" value="0">
      <input class="uk-checkbox" name="active" type="checkbox" value="1">
    </div>
  <br>
    <label class="uk-form-label">Tipo associato</label>
    <div class="uk-form-controls">
      <select class="uk-select uk-form-width-medium" id="select_tipo" name="fk_tipo_associato" value="<?php echo set_value('fk_tipo_associato'); ?>" required>
        <option value="">*Tipo associato...</option>
      </select>
      <?php echo form_error('fk_tipo_associato'); ?>
    </div>
    
    <label class="uk-form-label">Carica</label>
    <div class="uk-form-controls">  
      <select class="uk-select uk-form-width-medium" id="select_carica" name="fk_cariche_direttivo" value="<?php echo set_value('fk_cariche_direttivo'); ?>" required>
        <option value="">*Carica direttivo</option>
      </select>
      <?php echo form_error('fk_cariche_direttivo'); ?>
    </div>

    <label class="uk-form-label">Note aggiuntive</label>
    <div class="uk-form-controls">
      <textarea class="uk-textarea uk-form-width-medium" name="note" rows="2"><?php echo set_value('note'); ?></textarea>
      <?php echo form_error('note'); ?>
    </div>

    <button class="uk-button uk-button-default" type="submit">Invia</button>

    </fieldset>
</form>


        </div> <!-- fine container -->

</div> <!-- fine sezione -->

</div> <!--fine colonna -->

<!-- chiamate ajax -->
<script src="<?php echo base_url('assets/js/luoghi.js');?>"></script>
<script src="<?php echo base_url('assets/js/tipi.js');?>"></script>
<script src="<?php echo base_url('assets/js/img_preview.js');?>"></script>
