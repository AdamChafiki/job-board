import {
  Flex,
  Button,
  Link,
  Spacer,
  Image,
  Container,
} from "@chakra-ui/react";

const Navbar = () => {
  return (
    <Container p={4} maxW="1000px">
      <Flex align="center" maxW="1200px" mx="auto">
        {/* Logo */}
        <Image src="/logo.png" alt="Logo" boxSize="50px" />

        {/* Navigation Links */}
        <Flex ml={10} gap={5}>
          <Link href="#" _hover={{ textDecoration: "none", color: "blue.400" }}>
            Browse
          </Link>
          <Link href="#" _hover={{ textDecoration: "none", color: "blue.400" }}>
            Jobs
          </Link>
        </Flex>

        <Spacer />

        {/* Buttons */}
        <Flex gap={4}>
          <Button colorScheme="blue" colorPalette={"blue"} variant="outline">
            Login
          </Button>
          <Button colorScheme="blue" colorPalette={"blue"}>
            Register
          </Button>
        </Flex>
      </Flex>
    </Container>
  );
};

export default Navbar;
