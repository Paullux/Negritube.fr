function sendForm(id, videoID, title, description) {
    const iframe = document.getElementById("video");
    const titlehere = document.getElementById("title");
    const descriptionhere = document.getElementById("description");
    iframe.src = 'https://www.youtube.com/embed/' + videoID + '';
    iframe.title = title;
    titlehere.innerHTML = title;
    descriptionhere.innerHTML = description;
    document.title = '' + title + ' - Negritube';
    $('meta[name=description]').attr('content', 'Clip - ' + title + '');
    $('meta[property="og:url"]').attr('content', 'https://negritube.fr/video-' + id + '.html');
    $('meta[property="og:title"]').attr('content', '' + title + ' - Negritube');
    $('meta[property="og:description"]').attr('content', 'Clip - ' + title + '');
    $('meta[property="og:image"]').attr('content', 'https://img.youtube.com/vi/' + videoID + '/hqdefault.jpg');
    $('meta[property="twitter:url"]').attr('content', 'https://negritube.fr/video-' + id + '.html');
    $('meta[property="twitter:title"]').attr('content', 'Clip - ' + title + '');
    $('meta[property="twitter:description"]').attr('content', '' + title + ' - Negritube');
    $('meta[property="twitter:image"]').attr('content', 'https://img.youtube.com/vi/' + videoID + '/hqdefault.jpg');
    var Server = "";
    if (window.location.href.indexOf("paulluxwaffle.synology.me") > -1) {
      Server = "https://paulluxwaffle.synology.me/Multi-Plateform/";
    } else {
      Server = "https://negritube.fr/";
    }
    window.history.replaceState('', '', Server + 'video-' + id + '.html');
}