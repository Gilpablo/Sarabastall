<?php

    class UsuarioModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getUsuariosActivos(){
            $this->db->query("SELECT Persona.*, Rol.NombreRol   FROM Persona,Rol WHERE Persona.Activo=1 and Persona.idRol=Rol.idRol ");
            
            return $this->db->registros();
        }

        public function getUsuario($id_persona){
            $this->db->query("SELECT *, Alumno.Tutor_Legal, Alumno.Imagen, Alumno.Curso_Actual 
                            FROM Persona LEFT JOIN Alumno ON Alumno.idPersona=Persona.idPersona WHERE Persona.idPersona=:id_persona");
            $this->db->bind(':id_persona',$id_persona);                        
            return $this->db->registro();
        }

        public function addUsuario($datos,$foto){
            
            if ($datos["tipo_us"]=="alumno") {
               
          
  
            $this->db->query("INSERT INTO Persona(Activo, Genero, Nombre, Apellido, Telefono, Correo, Fecha_Nacimiento, idRol)
                 VALUES(1, :genero_us, :nombre_us, :apellido_us, :telefono_us, :email_us, :fechanac_us,40)");
            //vinculamos los valores
            $this->db->bind(':nombre_us',trim($datos['nombre_us']));
            $this->db->bind(':genero_us',trim($datos['genero_us']));
            $this->db->bind(':apellido_us',trim($datos['apellido_us']));
            $this->db->bind(':telefono_us',trim($datos['telefono_us']));
            $this->db->bind(':email_us',trim($datos['email_us']));
            $this->db->bind(':fechanac_us',trim($datos['fechanac_us']));


            $id_persona=$this->db->executeLastId();
           
            $this->db->query("INSERT INTO Alumno(Tutor_Legal, Imagen, Curso_Actual, idPersona)
                 VALUES(:tutor_legal, :imagen, :curso_actual, :idPersona)");
                $this->db->bind(':tutor_legal',trim($datos['tutor_legal']));
                $this->db->bind(':imagen',$foto);
                $this->db->bind(':curso_actual',trim($datos['curso_actual']));
                $this->db->bind(':idPersona',$id_persona);

            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }

            }
            if ($datos["tipo_us"]=="admin") {
                
            
                $this->db->query("INSERT INTO Persona(Clave, Username , Activo, Genero, Nombre, Apellido, Telefono, Correo, Fecha_Nacimiento, idRol)
                     VALUES(sha2(:clave,256),:username, 1, :genero_us, :nombre_us, :apellido_us, :telefono_us, :email_us, :fechanac_us, 10)");
                //vinculamos los valores
                $this->db->bind(':username',trim($datos['username']));
                $this->db->bind(':clave',trim($datos['clave']));
                $this->db->bind(':nombre_us',trim($datos['nombre_us']));
                $this->db->bind(':genero_us',trim($datos['genero_us']));
                $this->db->bind(':apellido_us',trim($datos['apellido_us']));
                $this->db->bind(':telefono_us',trim($datos['telefono_us']));
                $this->db->bind(':email_us',trim($datos['email_us']));
                $this->db->bind(':fechanac_us',trim($datos['fechanac_us']));
    
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
            }

            if ($datos["tipo_us"]=="profesor") {
                
            
                $this->db->query("INSERT INTO Persona(Clave, Username , Activo, Genero, Nombre, Apellido, Telefono, Correo, Fecha_Nacimiento, idRol)
                     VALUES(sha2(:clave,256),:username, 1, :genero_us, :nombre_us, :apellido_us, :telefono_us, :email_us, :fechanac_us, 20)");
                //vinculamos los valores
                $this->db->bind(':username',trim($datos['username']));
                $this->db->bind(':clave',trim($datos['clave']));
                $this->db->bind(':nombre_us',trim($datos['nombre_us']));
                $this->db->bind(':genero_us',trim($datos['genero_us']));
                $this->db->bind(':apellido_us',trim($datos['apellido_us']));
                $this->db->bind(':telefono_us',trim($datos['telefono_us']));
                $this->db->bind(':email_us',trim($datos['email_us']));
                $this->db->bind(':fechanac_us',trim($datos['fechanac_us']));
    
                $id_persona=$this->db->executeLastId();

                $this->db->query("INSERT INTO Instructor(idPersona)
                                VALUES(:idPersona)");
                $this->db->bind(':idPersona',$id_persona);
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
            }

            if ($datos["tipo_us"]=="aprendiz") {
                
            
                $this->db->query("INSERT INTO Persona(Clave, Username , Activo, Genero, Nombre, Apellido, Telefono, Correo, Fecha_Nacimiento, idRol)
                     VALUES(sha2(:clave,256), :username,1, :genero_us, :nombre_us, :apellido_us, :telefono_us, :email_us, :fechanac_us, 30)");
                //vinculamos los valores
                $this->db->bind(':username',trim($datos['username']));
                $this->db->bind(':clave',trim($datos['clave']));
                $this->db->bind(':nombre_us',trim($datos['nombre_us']));
                $this->db->bind(':genero_us',trim($datos['genero_us']));
                $this->db->bind(':apellido_us',trim($datos['apellido_us']));
                $this->db->bind(':telefono_us',trim($datos['telefono_us']));
                $this->db->bind(':email_us',trim($datos['email_us']));
                $this->db->bind(':fechanac_us',trim($datos['fechanac_us']));
    
                $id_persona=$this->db->executeLastId();

                $this->db->query("INSERT INTO Aprendiz(idPersona)
                                VALUES(:idPersona)");
                $this->db->bind(':idPersona',$id_persona);
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
            }

            if ($datos["tipo_us"]=="madrina") {
                
            
                $this->db->query("INSERT INTO Persona(Activo, Genero, Nombre, Apellido, Telefono, Correo, Fecha_Nacimiento, idRol)
                     VALUES(1, :genero_us, :nombre_us, :apellido_us, :telefono_us, :email_us, :fechanac_us, 50)");
                //vinculamos los valores

                $this->db->bind(':nombre_us',trim($datos['nombre_us']));
                $this->db->bind(':genero_us',trim($datos['genero_us']));
                $this->db->bind(':apellido_us',trim($datos['apellido_us']));
                $this->db->bind(':telefono_us',trim($datos['telefono_us']));
                $this->db->bind(':email_us',trim($datos['email_us']));
                $this->db->bind(':fechanac_us',trim($datos['fechanac_us']));
    
                $id_persona=$this->db->executeLastId();

                $this->db->query("INSERT INTO Madrina(idPersona)
                                VALUES(:idPersona)");
                $this->db->bind(':idPersona',$id_persona);
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function editUsuario($datos,$id_persona,$idRol){

            
                $this->db->query("UPDATE Persona SET Nombre=:nombre, Apellido=:apellido, Genero=:genero, Telefono=:telefono, Correo=:email 
                                        WHERE idPersona=:id_persona");
                $this->db->bind(':nombre',$datos['nombre']);
                $this->db->bind(':apellido',$datos['apellido']);
                $this->db->bind(':genero',$datos['genero']);
                $this->db->bind(':telefono',$datos['telefono']);
                $this->db->bind(':email',$datos['email']);
                $this->db->bind(':id_persona',$id_persona);  

                if ($idRol==40) {
                    
                    $this->db->query("UPDATE Alumno SET Tutor_Legal=:tutor_legal, Imagen=:imagen, Curso_Actual=:curso_actual
                                        WHERE idPersona=:id_persona");
                    $this->db->bind(':tutor_legal',$datos['tutor_legal']);
                    $this->db->bind(':imagen',$datos['imagen']);
                    $this->db->bind(':curso_actual',$datos['curso_actual']);
                    $this->db->bind(':id_persona',$id_persona);
                }
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
            
        }

        public function deleteUsuario($id_persona){

            $this->db->query("DELETE FROM Persona WHERE idPersona=:id_persona");
            $this->db->bind(':id_persona',$id_persona);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }
    }    