const
    image = $('#image'),
    testo = $('#testo'),
    btn = $('#fileBTN'),
    container = $('#posts-container'),
    prop = 'backgroundColor',
    colors = ['#3490DC', '#EF7E05F2'];


image.on({
        input: () => btn.css(prop, colors[1]),
        change: () => {
            if(!image.val())
                btn.css(prop, colors[0])
        }
    }
);

const reset = e => {
    e.preventDefault();
    e.target.reset();
    btn.css(prop, colors[0]);
};

const isValid = val => val !== null && val !== undefined

const isValidPost = (image, text) => (
    isValid(image) &&
    isValid(text) &&
    (image.size / 1000 ) < 2000 &&
    text.length > 1
);

$('#postForm').submit(function (e) {
    let err = 0;
    const
        postImage = image[0].files[0],
        postText = testo.val();
    if(postText.length <= 0) {
        window.alert('Testo del post troppo corto (min = 1 carattere).');
        err++;
    }
    if((postImage.size / 1000 ) > 2000) {  // KB
        window.alert('File troppo pesante (max = 2 MB).');
        err++;
    }
    if(err > 0)
        e.preventDefault();
});

const
    postsOrder = $('select.postsOrder'),
    formOrder = $('form.postsOrder')[0];

postsOrder.change(async (e) => {
    console.log(e);
    const res = await axios({
        method: formOrder.method,
        url: formOrder.action,
        data: {
            postsOrderName:  postsOrder[0].value,
            postsOrderType:  postsOrder[1].value,
        }
    })
        .catch(e => console.error(e));
    console.log(res);
    isValid(res) && res.status === 200 ?
        container.html(res.data) :
        window.alert("Errore nell' ordinamento dei Post.");
});


const like = async (post_id) => {
    const res = await axios.post('ricezione-dati/like', { post_id })
        .catch(e => console.error(e));
    console.log(res);
    isValid(res) && res.status === 200 ?
        $('#like_container-'+ post_id).html(res.data) :
        window.alert("Errore nel click del Like.");
}