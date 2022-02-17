<?php

function get_price($cat)
{
	$price=$cat->price;;
	if(count($cat->children)>0)
                        {
                           foreach($cat->children as $child)
                           {
                            $price+=get_price($child);

                           }
                        }else
                        {
                          $price=$cat->price;
                        }
   return $price;
}
