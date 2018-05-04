<?php
function pagetitle()
{
 if($_REQUEST["page"]=="")
 {
  $pagetile="Naughty Paaji | Know your rights with some entertainment";
 }
 elseif($_REQUEST["page"]==1)
 {
  $pagetile="Naughty Paaji | Ask Your Lawyer";
 } 
  elseif($_REQUEST["page"]==2)
 {
  $pagetile="Naughty Paaji | Share Your Experience";
 }
  elseif($_REQUEST["page"]==3)
 {
  $pagetile="Naughty Paaji | Thanks";
 }
  elseif($_REQUEST["page"]==4)
 {
  $pagetile="Naughty Paaji | Contact Us";
 }
  elseif($_REQUEST["page"]==5)
 {
  $pagetile="Naughty Paaji | User Registration";
 }
  elseif($_REQUEST["page"]==6)
 {
  $pagetile="Naughty Paaji | Login";
 }
  elseif($_REQUEST["page"]==7)
 {
  $pagetile="Naughty Paaji | Logout";
 }
  elseif($_REQUEST["page"]==8)
 {
  $pagetile="Naughty Paaji | Forgot Password";
 }
  elseif($_REQUEST["page"]==9)
 {
  $pagetile="Naughty Paaji | Discussion Board";
 }
  elseif($_REQUEST["page"]==10)
 {
  $pagetile="Naughty Paaji | Know Your Rights";
 }
  elseif($_REQUEST["page"]==11)
 {
  $pagetile="Naughty Paaji | About Naughty Paaji";
 }
  elseif($_REQUEST["page"]==12)
 {
  $pagetile="Naughty Paaji | Discussion Board";
 }
  elseif($_REQUEST["page"]==13)
 {
  $pagetile="Naughty Paaji | Change Password";
 }
 elseif($_REQUEST["page"]==14)
 {
  $pagetile="Naughty Paaji | Know Your Duties";
 }
 elseif($_REQUEST["page"]==17)
 {
  $pagetile="Naughty Paaji | Disclaimer";
 }
 elseif($_REQUEST["page"]==18)
 {
  $pagetile="Naughty Paaji | Privacy Policy";
 }
 elseif($_REQUEST["page"]==19)
 {
  $pagetile="Naughty Paaji | Terms Of Use";
 }
 
 elseif($_REQUEST["page"]==20)
 {
  $pagetile="Naughty Paaji | Share Experience";
 }
 elseif($_REQUEST["page"]==21)
 {
  $pagetile="Naughty Paaji | Share Experience";
 }
 
 elseif($_REQUEST["page"]==22)
 {
  $pagetile="Naughty Paaji | Latest Press Released";
 }
 
 return $pagetile;
}

?>