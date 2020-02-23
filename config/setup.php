<?php
//
//-- phpMyAdmin SQL Dump
//-- version 4.9.3
//-- https://www.phpmyadmin.net/
//--
//-- Host: localhost:3306
//-- Generation Time: Feb 23, 2020 at 08:43 PM
//-- Server version: 5.7.26
//-- PHP Version: 7.4.2
//
//SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
//SET time_zone = "+00:00";
//
//--
//-- Database: `camagru`
//--
//
//-- --------------------------------------------------------
//
//--
//-- Table structure for table `users`
//--
//
//CREATE TABLE `users` (
//`username` varchar(60) NOT NULL,
//  `email` varchar(60) NOT NULL,
//  `password` varchar(256) NOT NULL,
//  `activated` tinyint(1) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;
//
//--
//-- Dumping data for table `users`
//--
//
//INSERT INTO `users` (`username`, `email`, `password`, `activated`) VALUES
//('Vadym test', 'test@test', 'test', 1);
//
//--
//-- Indexes for dumped tables
//--
//
//--
//-- Indexes for table `users`
//--
//ALTER TABLE `users`
//  ADD PRIMARY KEY (`username`),
//  ADD UNIQUE KEY `email` (`email`);

include 'DB.php';

$db = new DB();

$db->query("CREATE DATABASE camagru;");
$db->query("USE camagru;");

$db->query("
CREATE TABLE `users` (
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$db->query("
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);");