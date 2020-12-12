<?php

	$artista = isset($_POST['txtArtista']) ? $_POST['txtArtista'] : NULL;
	$album = isset($_POST['txtAlbum']) ? $_POST['txtAlbum'] : NULL;
	$gravadora = isset($_POST['txtGravadora']) ? $_POST['txtGravador'] : NULL;

	$sql = "SELECT codigo, nome, FROM discos ";

	$filtros[] = array();

	if (!empty($artista))
	{
		$filtros[] = "artista LIKE '%artista%'";
	}

	if(!empty($album))
	{
		$filtros[] = "album LIKE '%album%'";
	}

	if(!empty($gravadora))
	{
		$filtros = "gravadora LIKE '%gravadora%'";
	}

	if(count($filtros) > 0)
	{
		$sql .= ' WHERE ' . implode(' AND  ', $filtros);
	}

	print $sql . "<br>";

?>