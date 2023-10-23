-- public.users definition

-- Drop table

-- DROP TABLE public.users;

CREATE TABLE public.users (
	id bigserial NOT NULL,
	"name" varchar NOT NULL,
	email varchar NOT NULL,
	"password" varchar NOT NULL,
	CONSTRAINT users_pk PRIMARY KEY (id)
);

-- public.links definition

-- Drop table

-- DROP TABLE public.links;

CREATE TABLE public.links (
	id bigserial NOT NULL,
	link varchar NOT NULL,
	shorten_link varchar NOT NULL,
	id_user bigint NOT NULL,
	status int8 NOT NULL DEFAULT 1,
	count int8 NOT NULL DEFAULT 0,
	CONSTRAINT links_pk PRIMARY KEY (shorten_link)
);


-- public.links foreign keys

ALTER TABLE public.links ADD CONSTRAINT links_id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id);
