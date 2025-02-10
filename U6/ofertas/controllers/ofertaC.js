function index(req,res){
    res.status(200).send('Página de index');
}


function store(req,res){
    res.status(200).send('store');
}


function show(req,res){
    res.status(200).send('Página de show');
}


function update(req,res){
    res.status(200).send('Página de update');
}


function destroy(req,res){
    res.status(200).send('Página de destroy');
}


module.exports={

    index , show , store , update , destroy



}