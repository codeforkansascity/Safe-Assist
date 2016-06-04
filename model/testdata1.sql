-- simple test db (insert statements only, no schema)
-- both passwords are 123456
INSERT INTO `addresses` (`id`, `street`, `city`, `state`, `zip1`, `zip2`, `created_at`, `updated_at`) VALUES
(3, '123 easy st', 'bloomington', 'IN', '47401', NULL, '2016-01-02 08:19:41', '2016-01-02 08:19:41'),
(4, '567 lois ln.', 'Topeka', 'KS', '66604', NULL, '2016-01-02 08:22:05', '2016-01-02 08:22:05');

INSERT INTO `users` (`id`, `disabled`, `email`, `password`, `first_name`, `last_name`, `administrator`, `remember_token`, `address_id`, `created_at`, `updated_at`) VALUES
(3, 0, 'test1@spamdecoy.net', '$2y$10$qUYDHDDtqAqdg.8hxUIwYukA1ms25eFPWt6gklrfVBIRfyCmAFHHC', 'test', 'person', 0, 'NcWrDIm6tWt58fhHJ2yFRvD5nFrBf4BzpDAl8C4kIGtTCiOcQDp7aX1k2SQR', 3, '2016-01-02 08:19:41', '2016-01-02 08:24:39'),
(4, 0, 'test2@spamdecoy.net', '$2y$10$sOCxmDOiXtAfv.w4h2faK.d7GGOEXF6SWt547iUU5/LUxjLnKJMZ.', 'other', 'person', 1, '3gYd0FCojNgSuABIKhCR2jdthWfJHESdzDN1NGCa8ISZilltktzyrbHJ16QN', 4, '2016-01-02 08:22:05', '2016-01-02 08:25:44');

INSERT INTO `consumers` (`id`, `disabled`, `sponsor`, `first_name`, `last_name`, `description`, `address_id`, `created_at`, `updated_at`) VALUES
(1, 0, 3, 'billy', 'jean', 'may respond defensively to physical touch', 3, NULL, NULL),
(2, 1, 3, 'john', 'henry', 'can''t hear verbal commands', 3, NULL, NULL);

INSERT INTO `agencies` VALUES 
(1,'KC Police Department',3,'2016-02-20 18:48:11','2016-02-20 18:48:11'),
(2,'KC Fire Department',4,'2016-02-20 18:48:37','2016-02-20 18:49:03');
