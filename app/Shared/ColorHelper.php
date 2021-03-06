<?php

namespace App\Shared;

class ColorHelper {
  protected $colist = [
    ['name' => 'AliceBlue', 'bg' => '#F0F8FF', 'f' => '#000000',],
    ['name' => 'AntiqueWhite', 'bg' => '#FAEBD7', 'f' => '#000000',],
    ['name' => 'Aqua', 'bg' => '#00FFFF', 'f' => '#000000',],
    ['name' => 'Aquamarine', 'bg' => '#7FFFD4', 'f' => '#000000',],
    ['name' => 'Azure', 'bg' => '#F0FFFF', 'f' => '#000000',],
    ['name' => 'Beige', 'bg' => '#F5F5DC', 'f' => '#000000',],
    ['name' => 'Bisque', 'bg' => '#FFE4C4', 'f' => '#000000',],
    ['name' => 'Black', 'bg' => '#000000', 'f' => '#FFFFFF',],
    ['name' => 'BlanchedAlmond', 'bg' => '#FFEBCD', 'f' => '#000000',],
    ['name' => 'Blue', 'bg' => '#0000FF', 'f' => '#000000',],
    ['name' => 'BlueViolet', 'bg' => '#8A2BE2', 'f' => '#000000',],
    ['name' => 'Brown', 'bg' => '#A52A2A', 'f' => '#000000',],
    ['name' => 'BurlyWood', 'bg' => '#DEB887', 'f' => '#000000',],
    ['name' => 'CadetBlue', 'bg' => '#5F9EA0', 'f' => '#000000',],
    ['name' => 'Chartreuse', 'bg' => '#7FFF00', 'f' => '#000000',],
    ['name' => 'Chocolate', 'bg' => '#D2691E', 'f' => '#FFFFFF',],
    ['name' => 'Coral', 'bg' => '#FF7F50', 'f' => '#FFFFFF',],
    ['name' => 'CornflowerBlue', 'bg' => '#6495ED', 'f' => '#000000',],
    ['name' => 'Cornsilk', 'bg' => '#FFF8DC', 'f' => '#000000',],
    ['name' => 'Crimson', 'bg' => '#DC143C', 'f' => '#FFFFFF',],
    ['name' => 'Cyan', 'bg' => '#00FFFF', 'f' => '#000000',],
    ['name' => 'DarkBlue', 'bg' => '#00008B', 'f' => '#FFFFFF',],
    ['name' => 'DarkCyan', 'bg' => '#008B8B', 'f' => '#000000',],
    ['name' => 'DarkGoldenRod', 'bg' => '#B8860B', 'f' => '#FFFFFF',],
    ['name' => 'DarkGray', 'bg' => '#A9A9A9', 'f' => '#000000',],
    ['name' => 'DarkGreen', 'bg' => '#006400', 'f' => '#FFFFFF',],
    ['name' => 'DarkKhaki', 'bg' => '#BDB76B', 'f' => '#000000',],
    ['name' => 'DarkMagenta', 'bg' => '#8B008B', 'f' => '#FFFFFF',],
    ['name' => 'DarkOliveGreen', 'bg' => '#556B2F', 'f' => '#FFFFFF',],
    ['name' => 'DarkOrange', 'bg' => '#FF8C00', 'f' => '#FFFFFF',],
    ['name' => 'DarkOrchid', 'bg' => '#9932CC', 'f' => '#FFFFFF',],
    ['name' => 'DarkRed', 'bg' => '#8B0000', 'f' => '#FFFFFF',],
    ['name' => 'DarkSalmon', 'bg' => '#E9967A', 'f' => '#FFFFFF',],
    ['name' => 'DarkSeaGreen', 'bg' => '#8FBC8F', 'f' => '#000000',],
    ['name' => 'DarkSlateBlue', 'bg' => '#483D8B', 'f' => '#000000',],
    ['name' => 'DarkSlateGray', 'bg' => '#2F4F4F', 'f' => '#000000',],
    ['name' => 'DarkTurquoise', 'bg' => '#00CED1', 'f' => '#000000',],
    ['name' => 'DarkViolet', 'bg' => '#9400D3', 'f' => '#000000',],
    ['name' => 'DeepPink', 'bg' => '#FF1493', 'f' => '#000000',],
    ['name' => 'DeepSkyBlue', 'bg' => '#00BFFF', 'f' => '#000000',],
    ['name' => 'DimGray', 'bg' => '#696969', 'f' => '#000000',],
    ['name' => 'DodgerBlue', 'bg' => '#1E90FF', 'f' => '#000000',],
    ['name' => 'FireBrick', 'bg' => '#B22222', 'f' => '#000000',],
    ['name' => 'FloralWhite', 'bg' => '#FFFAF0', 'f' => '#000000',],
    ['name' => 'ForestGreen', 'bg' => '#228B22', 'f' => '#000000',],
    ['name' => 'Fuchsia', 'bg' => '#FF00FF', 'f' => '#000000',],
    ['name' => 'Gainsboro', 'bg' => '#DCDCDC', 'f' => '#000000',],
    ['name' => 'GhostWhite', 'bg' => '#F8F8FF', 'f' => '#000000',],
    ['name' => 'Gold', 'bg' => '#FFD700', 'f' => '#000000',],
    ['name' => 'GoldenRod', 'bg' => '#DAA520', 'f' => '#000000',],
    ['name' => 'Gray', 'bg' => '#808080', 'f' => '#000000',],
    ['name' => 'Green', 'bg' => '#008000', 'f' => '#000000',],
    ['name' => 'GreenYellow', 'bg' => '#ADFF2F', 'f' => '#000000',],
    ['name' => 'HoneyDew', 'bg' => '#F0FFF0', 'f' => '#000000',],
    ['name' => 'HotPink', 'bg' => '#FF69B4', 'f' => '#000000',],
    ['name' => 'IndianRed ', 'bg' => '#CD5C5C', 'f' => '#000000',],
    ['name' => 'Indigo ', 'bg' => '#4B0082', 'f' => '#FFFFFF',],
    ['name' => 'Ivory', 'bg' => '#FFFFF0', 'f' => '#000000',],
    ['name' => 'Khaki', 'bg' => '#F0E68C', 'f' => '#000000',],
    ['name' => 'Lavender', 'bg' => '#E6E6FA', 'f' => '#000000',],
    ['name' => 'LavenderBlush', 'bg' => '#FFF0F5', 'f' => '#000000',],
    ['name' => 'LawnGreen', 'bg' => '#7CFC00', 'f' => '#000000',],
    ['name' => 'LemonChiffon', 'bg' => '#FFFACD', 'f' => '#000000',],
    ['name' => 'LightBlue', 'bg' => '#ADD8E6', 'f' => '#000000',],
    ['name' => 'LightCoral', 'bg' => '#F08080', 'f' => '#000000',],
    ['name' => 'LightCyan', 'bg' => '#E0FFFF', 'f' => '#000000',],
    ['name' => 'LightGoldenRodYellow', 'bg' => '#FAFAD2', 'f' => '#000000',],
    ['name' => 'LightGray', 'bg' => '#D3D3D3', 'f' => '#000000',],
    ['name' => 'LightGreen', 'bg' => '#90EE90', 'f' => '#000000',],
    ['name' => 'LightPink', 'bg' => '#FFB6C1', 'f' => '#000000',],
    ['name' => 'LightSalmon', 'bg' => '#FFA07A', 'f' => '#000000',],
    ['name' => 'LightSeaGreen', 'bg' => '#20B2AA', 'f' => '#000000',],
    ['name' => 'LightSkyBlue', 'bg' => '#87CEFA', 'f' => '#000000',],
    ['name' => 'LightSlateGray', 'bg' => '#778899', 'f' => '#000000',],
    ['name' => 'LightSteelBlue', 'bg' => '#B0C4DE', 'f' => '#000000',],
    ['name' => 'LightYellow', 'bg' => '#FFFFE0', 'f' => '#000000',],
    ['name' => 'Lime', 'bg' => '#00FF00', 'f' => '#000000',],
    ['name' => 'LimeGreen', 'bg' => '#32CD32', 'f' => '#000000',],
    ['name' => 'Linen', 'bg' => '#FAF0E6', 'f' => '#000000',],
    ['name' => 'Magenta', 'bg' => '#FF00FF', 'f' => '#FFFFFF',],
    ['name' => 'Maroon', 'bg' => '#800000', 'f' => '#FFFFFF',],
    ['name' => 'MediumAquaMarine', 'bg' => '#66CDAA', 'f' => '#000000',],
    ['name' => 'MediumBlue', 'bg' => '#0000CD', 'f' => '#FFFFFF',],
    ['name' => 'MediumOrchid', 'bg' => '#BA55D3', 'f' => '#000000',],
    ['name' => 'MediumPurple', 'bg' => '#9370DB', 'f' => '#000000',],
    ['name' => 'MediumSeaGreen', 'bg' => '#3CB371', 'f' => '#000000',],
    ['name' => 'MediumSlateBlue', 'bg' => '#7B68EE', 'f' => '#000000',],
    ['name' => 'MediumSpringGreen', 'bg' => '#00FA9A', 'f' => '#000000',],
    ['name' => 'MediumTurquoise', 'bg' => '#48D1CC', 'f' => '#000000',],
    ['name' => 'MediumVioletRed', 'bg' => '#C71585', 'f' => '#FFFFFF',],
    ['name' => 'MidnightBlue', 'bg' => '#191970', 'f' => '#FFFFFF',],
    ['name' => 'MintCream', 'bg' => '#F5FFFA', 'f' => '#000000',],
    ['name' => 'MistyRose', 'bg' => '#FFE4E1', 'f' => '#000000',],
    ['name' => 'Moccasin', 'bg' => '#FFE4B5', 'f' => '#000000',],
    ['name' => 'NavajoWhite', 'bg' => '#FFDEAD', 'f' => '#000000',],
    ['name' => 'Navy', 'bg' => '#000080', 'f' => '#FFFFFF',],
    ['name' => 'OldLace', 'bg' => '#FDF5E6', 'f' => '#000000',],
    ['name' => 'Olive', 'bg' => '#808000', 'f' => '#000000',],
    ['name' => 'OliveDrab', 'bg' => '#6B8E23', 'f' => '#000000',],
    ['name' => 'Orange', 'bg' => '#FFA500', 'f' => '#000000',],
    ['name' => 'OrangeRed', 'bg' => '#FF4500', 'f' => '#FFFFFF',],
    ['name' => 'Orchid', 'bg' => '#DA70D6', 'f' => '#000000',],
    ['name' => 'PaleGoldenRod', 'bg' => '#EEE8AA', 'f' => '#000000',],
    ['name' => 'PaleGreen', 'bg' => '#98FB98', 'f' => '#000000',],
    ['name' => 'PaleTurquoise', 'bg' => '#AFEEEE', 'f' => '#000000',],
    ['name' => 'PaleVioletRed', 'bg' => '#DB7093', 'f' => '#000000',],
    ['name' => 'PapayaWhip', 'bg' => '#FFEFD5', 'f' => '#000000',],
    ['name' => 'PeachPuff', 'bg' => '#FFDAB9', 'f' => '#000000',],
    ['name' => 'Peru', 'bg' => '#CD853F', 'f' => '#000000',],
    ['name' => 'Pink', 'bg' => '#FFC0CB', 'f' => '#000000',],
    ['name' => 'Plum', 'bg' => '#DDA0DD', 'f' => '#000000',],
    ['name' => 'PowderBlue', 'bg' => '#B0E0E6', 'f' => '#000000',],
    ['name' => 'Purple', 'bg' => '#800080', 'f' => '#FFFFFF',],
    ['name' => 'RebeccaPurple', 'bg' => '#663399', 'f' => '#FFFFFF',],
    ['name' => 'Red', 'bg' => '#FF0000', 'f' => '#FFFFFF',],
    ['name' => 'RosyBrown', 'bg' => '#BC8F8F', 'f' => '#000000',],
    ['name' => 'RoyalBlue', 'bg' => '#4169E1', 'f' => '#000000',],
    ['name' => 'SaddleBrown', 'bg' => '#8B4513', 'f' => '#FFFFFF',],
    ['name' => 'Salmon', 'bg' => '#FA8072', 'f' => '#000000',],
    ['name' => 'SandyBrown', 'bg' => '#F4A460', 'f' => '#000000',],
    ['name' => 'SeaGreen', 'bg' => '#2E8B57', 'f' => '#000000',],
    ['name' => 'SeaShell', 'bg' => '#FFF5EE', 'f' => '#000000',],
    ['name' => 'Sienna', 'bg' => '#A0522D', 'f' => '#FFFFFF',],
    ['name' => 'Silver', 'bg' => '#C0C0C0', 'f' => '#000000',],
    ['name' => 'SkyBlue', 'bg' => '#87CEEB', 'f' => '#000000',],
    ['name' => 'SlateBlue', 'bg' => '#6A5ACD', 'f' => '#FFFFFF',],
    ['name' => 'SlateGray', 'bg' => '#708090', 'f' => '#000000',],
    ['name' => 'Snow', 'bg' => '#FFFAFA', 'f' => '#000000',],
    ['name' => 'SpringGreen', 'bg' => '#00FF7F', 'f' => '#000000',],
    ['name' => 'SteelBlue', 'bg' => '#4682B4', 'f' => '#000000',],
    ['name' => 'Tan', 'bg' => '#D2B48C', 'f' => '#000000',],
    ['name' => 'Teal', 'bg' => '#008080', 'f' => '#FFFFFF',],
    ['name' => 'Thistle', 'bg' => '#D8BFD8', 'f' => '#000000',],
    ['name' => 'Tomato', 'bg' => '#FF6347', 'f' => '#000000',],
    ['name' => 'Turquoise', 'bg' => '#40E0D0', 'f' => '#000000',],
    ['name' => 'Violet', 'bg' => '#EE82EE', 'f' => '#000000',],
    ['name' => 'Wheat', 'bg' => '#F5DEB3', 'f' => '#000000',],
    ['name' => 'White', 'bg' => '#FFFFFF', 'f' => '#000000',],
    ['name' => 'WhiteSmoke', 'bg' => '#F5F5F5', 'f' => '#000000',],
    ['name' => 'Yellow', 'bg' => '#FFFF00', 'f' => '#000000',],
    ['name' => 'YellowGreen', 'bg' => '#9ACD32', 'f' => '#000000',],
  ];


  public static function GetRandColor(){
    $self = new static;
    return $self->colist[rand(0, sizeof($self->colist) - 1)];
  }

}
