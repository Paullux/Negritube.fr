<div id="aWrap">

  <div id="song_title_audio" class="song_title" style="border: none">
    <img  class='cover' id='coverVEnBas' src='' alt='cover'>
    <div class='listMusic'>
      <h3  class='Titre' id='TitreEnBas'>Titre :&nbsp;</h3>
      <p  class='Auteur' id='AuteurEnBas'>Artiste : </p>
      <p  class='Album' id='AlbumEnBas'>Album : </p>
    </div>
  </div>

  <!-- (A) PREVIOUS BUTTON -->
  <button id="skipPrevious"><span id="skipPreviousIco" class="material-icons">
    skip_previous
  </span></button>

  <!-- (B) PLAY/PAUSE BUTTON -->
  <button id="aPlay" disabled><span id="aPlayIco" class="material-icons">
    play_arrow
  </span></button>

  <!-- (C) NEXT BUTTON -->
  <button id="skipNext"><span id="skipNextIco" class="material-icons">
    skip_next
  </span></button>

  <!-- (D) AUTORENEW BUTTON -->
  <button id="autorenew"><span id="autorenewIco" class="material-icons">
    autorenew
  </span></button>

  <!-- (E) RANDOM BUTTON -->
  <button id="shuffle"><span id="shuffleIco" class="material-icons">
    shuffle
  </span></button>

  <!-- (F) TIME -->
  <div id="aCron">
    <span id="aNow"></span> / <span id="aTime"></span>
  </div>

  <!-- (G) SEEK BAR -->
  <input id="aSeek" type="range" min="0" value="0" step="1" disabled/>

  <!-- (H) VOLUME SLIDE -->
  <span id="aVolIco" class="material-icons">volume_up</span>
  <input id="aVolume" type="range" min="0" max="1" value="1" step="0.1" disabled/>
</div>
