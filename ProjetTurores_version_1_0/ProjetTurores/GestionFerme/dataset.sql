INSERT INTO especes (nom) VALUES
('Mouton'),
('Chameau'),
('Vache'),
('Poulet'),
('Chèvre'),
('Dinde'),
('Cheval'),
('Canard');

INSERT INTO betails (nom) VALUES
('Ovin'),
('Bovin'),
('Caprin'),
('Volaille'),
('Équin'),
('Camelidé');


INSERT INTO animeaux (nom, date_naissance, sexe, image, description, idEspece, idBetail) VALUES
('Bella', '2021-03-15', 'F', 'bella.jpg', 'Mouton docile et calme', 1, 1),
('Rex', '2020-05-11', 'M', 'rex.jpg', 'Mouton dominant du troupeau', 1, 1),
('Sahara', '2019-06-21', 'F', 'sahara.jpg', 'Chameau endurant', 2, 6),
('Simba', '2022-01-05', 'M', 'simba.jpg', 'Jeune chameau joueur', 2, 6),
('Marguerite', '2020-09-10', 'F', 'marguerite.jpg', 'Vache laitière', 3, 2),
('Tornade', '2018-12-25', 'M', 'tornade.jpg', 'Taureau de reproduction', 3, 2),
('Coco', '2023-03-30', 'F', 'coco.jpg', 'Poule pondeuse', 4, 4),
('Coqui', '2023-04-02', 'M', 'coqui.jpg', 'Coq vigoureux', 4, 4),
('Blanchette', '2022-07-08', 'F', 'blanchette.jpg', 'Chèvre agile', 5, 3),
('Cornu', '2021-08-13', 'M', 'cornu.jpg', 'Chèvre mâle dominant', 5, 3),
('Gina', '2021-11-01', 'F', 'gina.jpg', 'Dinde curieuse', 6, 4),
('Dindon', '2020-10-12', 'M', 'dindon.jpg', 'Dindon de parade', 6, 4),
('Éclair', '2019-02-14', 'M', 'eclair.jpg', 'Jeune cheval rapide', 7, 5),
('Fleur', '2020-03-03', 'F', 'fleur.jpg', 'Jument douce', 7, 5),
('Quack', '2022-08-20', 'M', 'quack.jpg', 'Canard bruyant', 8, 4),
('Daisy', '2022-09-01', 'F', 'daisy.jpg', 'Canne tranquille', 8, 4),
('Noisette', '2021-05-17', 'F', 'noisette.jpg', 'Petite chèvre joueuse', 5, 3),
('Tropico', '2018-07-23', 'M', 'tropico.jpg', 'Vieux chameau sage', 2, 6),
('Brume', '2020-12-30', 'F', 'brume.jpg', 'Vache rustique', 3, 2),
('Pompom', '2023-01-11', 'M', 'pompom.jpg', 'Jeune poulet', 4, 4),
('Titi', '2023-02-15', 'M', 'titi.jpg', 'Petit mouton curieux', 1, 1),
('Luna', '2022-11-19', 'F', 'luna.jpg', 'Chèvre paisible', 5, 3),
('Falco', '2019-03-10', 'M', 'falco.jpg', 'Étalon puissant', 7, 5),
('Snow', '2020-01-01', 'F', 'snow.jpg', 'Vache blanche tachetée', 3, 2),
('Riri', '2023-06-01', 'M', 'riri.jpg', 'Petit canard', 8, 4),
('Choupette', '2022-12-12', 'F', 'choupette.jpg', 'Dinde affectueuse', 6, 4);
