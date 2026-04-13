document.querySelectorAll('.yt-facade').forEach(el => {
  const id = el.dataset.id;
  const img = document.createElement('img');
  img.src = `https://i.ytimg.com/vi/${id}/hqdefault.jpg`;
  img.alt = el.dataset.title || 'Vidéo YouTube';
  img.loading = 'lazy';
  img.width = 480;
  img.height = 270;

  const btn = document.createElement('div');
  btn.className = 'yt-play-btn';
  btn.innerHTML = '▶';

  el.appendChild(img);
  el.appendChild(btn);

  el.addEventListener('click', () => {
    el.innerHTML = `<iframe src="https://www.youtube.com/embed/${id}?autoplay=1"
      title="${el.dataset.title || 'YouTube'}"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>`;
  }, { once: true });
});
