<?php

class View
{
	function generate($content_view, $data = null)
	{
		include 'app/views/'.$content_view;
	}
}