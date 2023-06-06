PGDMP         )        
        {         
   db_dtp_tkp    15.2    15.2 2    ;           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            <           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            =           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            >           1262    16400 
   db_dtp_tkp    DATABASE     �   CREATE DATABASE db_dtp_tkp WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE db_dtp_tkp;
                postgres    false            �            1259    16450    divisi    TABLE     0  CREATE TABLE public.divisi (
    id bigint NOT NULL,
    nama_divisi character varying(255) NOT NULL,
    deskripsi_divisi character varying(255) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.divisi;
       public         heap    postgres    false            �            1259    16449    divisi_id_seq    SEQUENCE     v   CREATE SEQUENCE public.divisi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.divisi_id_seq;
       public          postgres    false    217            ?           0    0    divisi_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.divisi_id_seq OWNED BY public.divisi.id;
          public          postgres    false    216            �            1259    16459    kategori    TABLE     6  CREATE TABLE public.kategori (
    id bigint NOT NULL,
    nama_kategori character varying(255) NOT NULL,
    deskripsi_kategori character varying(255) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.kategori;
       public         heap    postgres    false            �            1259    16458    kategori_id_seq    SEQUENCE     x   CREATE SEQUENCE public.kategori_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.kategori_id_seq;
       public          postgres    false    219            @           0    0    kategori_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.kategori_id_seq OWNED BY public.kategori.id;
          public          postgres    false    218            �            1259    16402 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16401    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    215            A           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    214            �            1259    16482 	   pelatihan    TABLE     �  CREATE TABLE public.pelatihan (
    id bigint NOT NULL,
    judul_pelatihan character varying(255) NOT NULL,
    tempat_pelatihan character varying(255) NOT NULL,
    scope_pelatihan character varying(20) NOT NULL,
    bersetifikat boolean NOT NULL,
    gambar_pelatihan character varying(255) NOT NULL,
    deskripsi_pelatihan character varying(255) NOT NULL,
    biaya_pelatihan bigint NOT NULL,
    tanggal_dimulai date NOT NULL,
    tanggal_berakhir date,
    id_kategori bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.pelatihan;
       public         heap    postgres    false            �            1259    16481    pelatihan_id_seq    SEQUENCE     y   CREATE SEQUENCE public.pelatihan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pelatihan_id_seq;
       public          postgres    false    223            B           0    0    pelatihan_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.pelatihan_id_seq OWNED BY public.pelatihan.id;
          public          postgres    false    222            �            1259    16496 	   pengajuan    TABLE     �  CREATE TABLE public.pengajuan (
    id bigint NOT NULL,
    tanggal_pengajuan date DEFAULT CURRENT_TIMESTAMP NOT NULL,
    tanggal_acc date,
    dokumen_pengajuan character varying(255) NOT NULL,
    status_pengajuan character varying(10) NOT NULL,
    id_pelatihan bigint NOT NULL,
    id_user bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.pengajuan;
       public         heap    postgres    false            �            1259    16495    pengajuan_id_seq    SEQUENCE     y   CREATE SEQUENCE public.pengajuan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.pengajuan_id_seq;
       public          postgres    false    225            C           0    0    pengajuan_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.pengajuan_id_seq OWNED BY public.pengajuan.id;
          public          postgres    false    224            �            1259    16468    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    nama_user character varying(255) NOT NULL,
    nik_user character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role_user character varying(12) NOT NULL,
    id_divisi bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16467    user_id_seq    SEQUENCE     t   CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    221            D           0    0    user_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.user_id_seq OWNED BY public.users.id;
          public          postgres    false    220                       2604    16453 	   divisi id    DEFAULT     f   ALTER TABLE ONLY public.divisi ALTER COLUMN id SET DEFAULT nextval('public.divisi_id_seq'::regclass);
 8   ALTER TABLE public.divisi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217            �           2604    16462    kategori id    DEFAULT     j   ALTER TABLE ONLY public.kategori ALTER COLUMN id SET DEFAULT nextval('public.kategori_id_seq'::regclass);
 :   ALTER TABLE public.kategori ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219            ~           2604    16405    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            �           2604    16485    pelatihan id    DEFAULT     l   ALTER TABLE ONLY public.pelatihan ALTER COLUMN id SET DEFAULT nextval('public.pelatihan_id_seq'::regclass);
 ;   ALTER TABLE public.pelatihan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            �           2604    16499    pengajuan id    DEFAULT     l   ALTER TABLE ONLY public.pengajuan ALTER COLUMN id SET DEFAULT nextval('public.pengajuan_id_seq'::regclass);
 ;   ALTER TABLE public.pengajuan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            �           2604    16471    users id    DEFAULT     c   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            0          0    16450    divisi 
   TABLE DATA           [   COPY public.divisi (id, nama_divisi, deskripsi_divisi, created_at, updated_at) FROM stdin;
    public          postgres    false    217   �<       2          0    16459    kategori 
   TABLE DATA           a   COPY public.kategori (id, nama_kategori, deskripsi_kategori, created_at, updated_at) FROM stdin;
    public          postgres    false    219   �=       .          0    16402 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    215   �=       6          0    16482 	   pelatihan 
   TABLE DATA           �   COPY public.pelatihan (id, judul_pelatihan, tempat_pelatihan, scope_pelatihan, bersetifikat, gambar_pelatihan, deskripsi_pelatihan, biaya_pelatihan, tanggal_dimulai, tanggal_berakhir, id_kategori, created_at, updated_at) FROM stdin;
    public          postgres    false    223   �>       8          0    16496 	   pengajuan 
   TABLE DATA           �   COPY public.pengajuan (id, tanggal_pengajuan, tanggal_acc, dokumen_pengajuan, status_pengajuan, id_pelatihan, id_user, created_at, updated_at) FROM stdin;
    public          postgres    false    225   �?       4          0    16468    users 
   TABLE DATA           w   COPY public.users (id, nama_user, nik_user, email, password, role_user, id_divisi, created_at, updated_at) FROM stdin;
    public          postgres    false    221   =@       E           0    0    divisi_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.divisi_id_seq', 14, true);
          public          postgres    false    216            F           0    0    kategori_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.kategori_id_seq', 3, true);
          public          postgres    false    218            G           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
          public          postgres    false    214            H           0    0    pelatihan_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.pelatihan_id_seq', 13, true);
          public          postgres    false    222            I           0    0    pengajuan_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.pengajuan_id_seq', 6, true);
          public          postgres    false    224            J           0    0    user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.user_id_seq', 5, true);
          public          postgres    false    220            �           2606    16457    divisi divisi_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.divisi
    ADD CONSTRAINT divisi_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.divisi DROP CONSTRAINT divisi_pkey;
       public            postgres    false    217            �           2606    16466    kategori kategori_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.kategori DROP CONSTRAINT kategori_pkey;
       public            postgres    false    219            �           2606    16407    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    215            �           2606    16489    pelatihan pelatihan_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT pelatihan_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pelatihan DROP CONSTRAINT pelatihan_pkey;
       public            postgres    false    223            �           2606    16501    pengajuan pengajuan_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_pkey;
       public            postgres    false    225            �           2606    16475    users user_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY public.users DROP CONSTRAINT user_pkey;
       public            postgres    false    221            �           2606    16490 '   pelatihan pelatihan_id_kategori_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pelatihan
    ADD CONSTRAINT pelatihan_id_kategori_foreign FOREIGN KEY (id_kategori) REFERENCES public.kategori(id) ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public.pelatihan DROP CONSTRAINT pelatihan_id_kategori_foreign;
       public          postgres    false    3220    219    223            �           2606    16502 (   pengajuan pengajuan_id_pelatihan_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_id_pelatihan_foreign FOREIGN KEY (id_pelatihan) REFERENCES public.pelatihan(id) ON DELETE RESTRICT;
 R   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_id_pelatihan_foreign;
       public          postgres    false    3224    225    223            �           2606    16507 #   pengajuan pengajuan_id_user_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.pengajuan
    ADD CONSTRAINT pengajuan_id_user_foreign FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE RESTRICT;
 M   ALTER TABLE ONLY public.pengajuan DROP CONSTRAINT pengajuan_id_user_foreign;
       public          postgres    false    3222    221    225            �           2606    16476    users user_id_divisi_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_id_divisi_foreign FOREIGN KEY (id_divisi) REFERENCES public.divisi(id) ON DELETE RESTRICT;
 F   ALTER TABLE ONLY public.users DROP CONSTRAINT user_id_divisi_foreign;
       public          postgres    false    3218    217    221            0   �   x����N�0@�3_�(��q_�H9����%�Bݝ�+_O;�xD#=i���(�p7j����������Pe�
��i�?|�;O?�ԁ(�Bs�Ќ�qӶ�R�f�ͻ�9�����je>om��C��{�z�K,��"�x;L���W��氄~{�Zh+�ŵ��ZsXæKBV�k�`��*�Yy	����\Ȳ����![X��<��Cv���Xs�x���̝�      2   H   x�3�t,*�L�L�L�Q��+I���LO�KN��N,IM�/�T������X��T��B���������W� ��      .   �   x�]�K� ��u=L� ��K�ɨS�i@��k�Ŭ�&�M
PA�����8{v'��A"�N�M��kб�)&钔(
\�)y����V���/׫���B�Ď4 �5��؞�X�P��F��� U�V6�c��ev�
�&�0Z���V:;~�+e�h2/w\��2�xl���qO����      6   �   x����
�0Eד��T�hP�t#�/t��͈�V�T�v�ߛ�,ZC�˝��U0v�)���O�.'�Q�����iN�A	�W#��F��%����Y*�L$z\j�V�6�I	��=��� m+J`ڄ����jL�6�|ty�]R4���KD}��U�ƺMcR�U���~����kD��B�/l�<�������|���~#�P�Mc�c��x�      8   �   x�m�;�@Dk�� �?�l�e�:u


J��R�����(�6d�c|�s���0u ������S�L�Sv˘��@���G?�&`����=�2�EI��+�n��<�:+��T��c���-s�M����+�u;�      4     x����N�@@��W�`[:�Ǭ�D,���A���@��h-���[��պrsss7�V��l�/@�hT7L~n`����"W�� 
��y�n�[��k����?U����&@��6�E��}��v�4�T3��� 1A:���Ô!��i#���U��rx'7_���׺�b^۵˽`9ޅ~�{,ۆ,�2�k_��Z<�4�����}jV�-7`� 97�#�atb���/+z|���e�̀/s���;�	���1�E�$�,_�A     